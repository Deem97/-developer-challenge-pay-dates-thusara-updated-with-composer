<?php

declare(strict_types=1);

namespace App\Services;

class SalaryService
{
    // Returns the salary payment date
    // If the payment day is a weekday, return it
    // If not, return the last weekday before the end of the month

    public function getSalaryPaymentDate(int $month, int $year): string
    {
        $date = new \DateTime();
        $date->setDate($year, $month, 1);
        $date->modify('last day of this month');
        $isWeekday = (int) $date->format('w');

        return ($isWeekday === 0 || $isWeekday === 6)
            ? $date->modify('last weekday')->format('Y-m-d')
            : $date->format('Y-m-d');
    }
}
