<?php


namespace App\Controller;


use App\Services\BundleName;

class DummyNameController
{
    /** @var BundleName */
    private $bundleName;

    public function __construct(BundleName $bundleName)
    {
        $this->bundleName = $bundleName;
    }

    public function showName(): array
    {
        dd($this->bundleName->getName());
    }
}
