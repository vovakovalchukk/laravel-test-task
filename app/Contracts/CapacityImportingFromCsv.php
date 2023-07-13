<?php

namespace App\Contracts;

interface CapacityImportingFromCsv
{
    public function import(string $filePath): void;
}
