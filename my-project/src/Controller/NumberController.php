<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Services\SumAndMultiplyWithNumber;

class NumberController extends AbstractController
{
    private $sumAndMultiplyWithNumber;
//    private $container;

    public function __construct(SumAndMultiplyWithNumber $sumAndMultiplyWithNumber)
    {
        $this->sumAndMultiplyWithNumber = $sumAndMultiplyWithNumber;
//        $this->container = $container;
    }

    public function getNumberAction()
    {
        $this->container->get('app.services.sum');
//        return $this->render(
//            'shownumber.html.twig'
//        );
    }

    public function callServiceAction(float $num1, float $num2)
    {
        dd(get_class($this->container));
        dd($this->sumAndMultiplyWithNumber->call($num1, $num2, 10.0));
    }
}