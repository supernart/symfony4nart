<?php

namespace App\Services;

class Sum implements SumInterface
{
    public function getSum(float $s1, float $s2): float
    {
        return $s1 + $s2;
    }
}