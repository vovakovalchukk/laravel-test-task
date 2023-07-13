<?php

namespace App\Contracts;

interface BookingImportingFromCsv
{
    public function import(string $filePath): void;
}
