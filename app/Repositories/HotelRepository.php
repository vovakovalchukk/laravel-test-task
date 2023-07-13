<?php

namespace App\Repositories;

use App\Contracts\Hotels\HotelRepositoryInterface;
use App\Enums\Bookings\StatusTypes;
use App\Models\Hotel;
use Illuminate\Support\Collection;

class HotelRepository implements HotelRepositoryInterface
{
    public function __construct(
    ) {}

    public function getHotelsWithSmallestWeekendStays(int $limit = 5): Collection
    {
        return Hotel::withCount(['bookings' => function ($query) {
            $query->where('status', StatusTypes::APPROVED)
                ->where(function ($query) {
                    $query->whereRaw('DAYOFWEEK(arrival_date) = 6')
                        ->orWhereRaw('DAYOFWEEK(arrival_date) = 7');
                });
        }])
            ->orderBy('bookings_count')
            ->limit(5)
            ->get(['id', 'name', 'bookings_count'])
            ->map(function ($hotel) {
                return [
                    'id' => $hotel->id,
                    'name' => $hotel->name,
                    'bookings_count' => $hotel->bookings_count,
                ];
            });
    }

    public function getAverageRejectionRatePerHotel(): Collection
    {
        return Hotel::query()->withCount([
            'bookings as total_bookings',
            'bookings as rejected_bookings' => function ($query) {
                $query->where('status', StatusTypes::REJECTED);
            }])
            ->get(['id', 'name'])
            ->map(function ($hotel) {
                $totalBookings = $hotel->total_bookings;
                $totalRejections = $hotel->rejected_bookings;

                $rejectionRate = $totalBookings > 0
                    ? round($totalRejections / $totalBookings * 100, 2)
                    : 0;

                return [
                    'hotel_id' => $hotel->id,
                    'hotel_name' => $hotel->name,
                    'rejection_rate' => $rejectionRate,
                    'total_rejections' => $totalRejections
                ];
            });
    }
}
