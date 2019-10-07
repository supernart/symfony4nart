<?php

namespace App\Controller;

use App\Services\Sum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Services\SumAndMultiplyWithNumber;
use Symfony\Component\HttpFoundation\Response;

class NumberController extends AbstractController
{
    private $sumAndMultiplyWithNumber;

    private $sum;

    public function __construct(SumAndMultiplyWithNumber $sumAndMultiplyWithNumber, Sum $sum)
    {
        $this->sumAndMultiplyWithNumber = $sumAndMultiplyWithNumber;
        $this->sum = $sum;
//        $this->container = $container;
    }

    public function getNumberAction()
    {
        return new Response($this->sum->getSum(22,333));
    }

    public function callServiceAction(float $num1, float $num2)
    {
        dd(get_class($this->container));
        dd($this->sumAndMultiplyWithNumber->call($num1, $num2, 10.0));
    }
}
