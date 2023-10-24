<?php

namespace App\Traits;

trait StatisticsTrait
{
    public function getMaxResult(array $values): int
    {
        return max($values);
    }
}