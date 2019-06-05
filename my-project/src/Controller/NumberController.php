<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Services\SumAndMultiplyWithNumber;

class NumberController extends AbstractController
{
    private $sumAndMultiplyWithNumber;

    public function __construct(SumAndMultiplyWithNumber $sumAndMultiplyWithNumber)
    {
        $this->sumAndMultiplyWithNumber = $sumAndMultiplyWithNumber;
    }

    public function getNumberAction()
    {
        return $this->render(
            'shownumber.html.twig'
        );
    }

    public function callServiceAction(float $num1, float $num2)
    {
        dd($this->sumAndMultiplyWithNumber->call($num1, $num2, 10.0));
        $mul = array(
            'result' => $result,
            'input1' => $num1,
            'input2' => $num2,
            'input3' => 10,
        );
        return $this->render(
            'calculate.html.twig',
            ['mul' => $mul]
        );
    }
}