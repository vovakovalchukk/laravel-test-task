<?php

namespace App\Services;

use App\Enums\Database\TableNames;
use Generator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class CapacityImportingFromCsv implements \App\Contracts\CapacityImportingFromCsv
{
    public function import(string $filePath): void
    {
        $file = new SplFileObject(base_path($filePath), 'r');
        $file->setFlags(SplFileObject::READ_CSV);

        $bookingRecords = [];
        $rowCount = 0;

        foreach ($file as $row) {
            $rowCount++;

            if ($row === false || count($row) !== 3 || $rowCount === 1) {
                continue;
            }

            $bookingRecords[] = $this->prepareData($row);

            if ($rowCount % 1000 === 0) {
                $this->generateInserting($this->insertData($bookingRecords));
                $bookingRecords = [];
            }
        }

        if (!empty($bookingRecords)) {
            $this->generateInserting($this->insertData($bookingRecords));
        }
    }

    private function prepareData(array $row): ?array
    {
        return [
            'hotel_id' => $row[0],
            'date' => Carbon::parse($row[1]),
            'capacity' => $row[2],
        ];
    }

    private function insertData(array $records): Generator
    {
        $chunks = array_chunk($records, 500);

        foreach ($chunks as $chunk) {
            DB::table(TableNames::CAPACITIES)->insert($chunk);
            yield;
        }
    }

    private function generateInserting($generatorItems): void
    {
        foreach ($generatorItems as $gItem) {
            // @ todo some logging logic
        }
    }
}
