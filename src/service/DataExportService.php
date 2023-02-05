<?php

declare(strict_types=1);

namespace App\Services;

class DataExportService
{
    // Exporting CSV data
    // This function takes filename, an array of data and creates a CSV file
    
    public function exportCSV(string $fileName, array $data): void
    {
        try {
            $filePath = __DIR__ . "/../../" . $fileName;
            $fp = fopen($filePath, 'w');
            if (!$fp) {
                throw new \Exception("Could not open file for writing");
            }
        
            if (!fputcsv($fp, $data['columns'])) {
                throw new \Exception("Could not write columns to file");
            }
        
            foreach ($data['rows'] as $row) {
                if (!fputcsv($fp, $row)) {
                    throw new \Exception("Could not write row to file");
                }
            }
        
            fclose($fp);

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
