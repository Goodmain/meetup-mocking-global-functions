<?php

namespace App\Services;

class SearchService
{
    public function getTopResult(array $values): int
    {
        return max($values);
    }
}
