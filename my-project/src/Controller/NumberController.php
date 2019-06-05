<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NumberController extends AbstractController
{
    public function getNumberAction(){
        $mynumbers = array(
            1,2,3,4,5,6,7
        );
        return $this->render(
            'shownumber.html.twig',
            ['mynumbers' => $mynumbers]
        );
    }

    public function getNumber2Action(){
        $mynumbers = array(
            44,444,44,44
        );
        return $this->render(
            'shownumber2.html.twig',
            ['mynumbers' => $mynumbers]
        );
    }
}