<?php

namespace App\Services;


interface SumAndMultiplyWithNumberInterface
{
    public function call(float $a, float $b, float $c): float;
}
