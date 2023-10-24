<?php

namespace App\Services;

use App\Traits\StatisticsTrait;

class StatisticsService
{
    use StatisticsTrait;

    public function getTopResult(array $values): int
    {
        return $this->getMaxResult($values);
    }
}
