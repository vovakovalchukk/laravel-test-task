<?php

namespace App\Repositories;

use App\Contracts\Bookings\BookingRepositoryInterface;
use App\Enums\Bookings\StatusTypes;
use App\Models\Booking;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookingRepository implements BookingRepositoryInterface
{
    public function getWithNullStatus($callback)
    {
        Booking::whereNull('status')
            ->orderBy('purchase_date')
            ->orderBy('id')
            ->lazy()
            ->each($callback);
    }

    public function updateStatuses($bookingIds, $status)
    {
        Booking::whereIn('id', $bookingIds)->update(['status' => $status]);
    }

    public function getMostUnluckyCustomers(): Collection
    {
        return Booking::query()->where('status', StatusTypes::REJECTED)
            ->select('customer_id', DB::raw('COUNT(*) as rejects'))
            ->groupBy('customer_id')
            ->orderByDesc('rejects')
            ->orderBy('customer_id')
            ->take(5)
            ->get()
            ->map(function ($booking) {
                return [
                    'customer_id' => $booking->customer_id,
                    'rejects' => $booking->rejects,
                ];
            });
    }
}
