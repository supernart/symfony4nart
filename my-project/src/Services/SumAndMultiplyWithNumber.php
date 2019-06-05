<?php

namespace App\Services;


class SumAndMultiplyWithNumber
{
    private $sum;

    public function __construct(Sum $sum)
    {
        $this->sum = $sum;
    }

    public function call(float $a, float $b, float $c)
    {
        return $this->sum->getSum($a, $b) * $c;
    }
}