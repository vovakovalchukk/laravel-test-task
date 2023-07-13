<?php

namespace App\Actions\Bookings;

use App\Contracts\Actions\ActionInterface;
use App\Contracts\Bookings\BookingRepositoryInterface;
use App\Contracts\Capacities\CapacityRepositoryInterface;
use App\Enums\Bookings\StatusTypes;
use App\Models\Booking;
use Illuminate\Support\Carbon;

class updateStatusesAction  implements ActionInterface
{
    public function __construct(
        private readonly CapacityRepositoryInterface $capacityRepository,
        private readonly BookingRepositoryInterface $bookingRepository
    ) {}

    public function handle(): bool
    {
        $approvedBookingIds = [];
        $rejectedBookingIds = [];

        $this->bookingRepository->getWithNullStatus(function ($booking) use (&$approvedBookingIds, &$rejectedBookingIds) {
            if ($this->isBookingApproved($booking)) {
                $approvedBookingIds[] = $booking->id;
            } else {
                $rejectedBookingIds[] = $booking->id;
            }
        });

        $this->updateBookingStatuses($approvedBookingIds, $rejectedBookingIds);

        return true;
    }

    protected function updateBookingStatuses($approvedBookingIds, $rejectedBookingIds): void
    {
        $this->bookingRepository->updateStatuses($approvedBookingIds, StatusTypes::APPROVED);
        $this->bookingRepository->updateStatuses($rejectedBookingIds, StatusTypes::REJECTED);
    }

    protected function isBookingApproved(Booking $booking): bool
    {
        $arrivalDate = Carbon::parse($booking->arrival_date)
            ->format('Y-m-d');

        $lastNight = Carbon::parse($booking->arrival_date)
            ->addDays($booking->nights - 1)
            ->format('Y-m-d');

        $availableDates = $this->capacityRepository->getAvailableDates(
            $booking->hotel_id,
            $arrivalDate,
            $lastNight,
            $booking->nights
        );

        if (count($availableDates) === $booking->nights) {
            $this->capacityRepository->decrementCapacity($availableDates);
            return true;
        }

        return false;
    }
}
