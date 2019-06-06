<?php

namespace App\Services;


class SumAndMultiplyWithNumber implements SumAndMultiplyWithNumberInterface
{
    /** @var SumInterface  */
    private $sum;

    public function __construct(SumInterface $sumInterface)
    {
        $this->sum = $sumInterface;
    }

    public function call(float $a, float $b, float $c): float
    {
        return $this->sum->getSum($a, $b) * $c;
    }
}
