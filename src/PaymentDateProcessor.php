<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\BonusService;
use App\Services\DataExportService;
use App\Services\SalaryService;

class PaymentDateProcessor
{
    //This function processes the payment dates by generating payment dates for the current year.
    //If a filename is provided in the command line arguments, that name is used for the exported CSV file.
    //Otherwise, a default file name is generated in the format "payment-date-{current_year}.csv".
    
    public function processPaymentDates(): void
    {
        global $argv;

        $currentYear = (new \DateTime())->format('Y');
        $fileName = array_key_exists(1, $argv) ? $argv[1].".csv" : "payment-date-$currentYear.csv";

        $data = $this->generatePaymentDates();

        $dataExportService = new DataExportService();
        $dataExportService->exportCSV($fileName, $data);
    }

    //This function generates payment dates for salary and bonus payments.

    public function generatePaymentDates(): array
    {
        $date = new \DateTime();
        $currentYear = (int)$date->format('Y');
        $currentMonth = (int)$date->format('n');

        $salaryService = new SalaryService();
        $bonusService = new BonusService();

        $data['columns'] = ['Month Name', 'Salary Payment Date', 'Bonus Payment Date'];

        for ($month = $currentMonth; $month <= 12; $month++) {
            $monthName = $date->setDate($currentYear, $month, 1)->format('F');
            $salaryPaymentDate = $salaryService->getSalaryPaymentDate($month, $currentYear);
            $bonusPaymentDate = $bonusService->getBonusPaymentDate($month, $currentYear);

            $data['rows'][] = [$monthName, $salaryPaymentDate, $bonusPaymentDate];
        }

        return $data;
    }
}

(new PaymentDateProcessor())->processPaymentDates();

