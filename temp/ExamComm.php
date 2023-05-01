<?php

namespace App\Temp;

class ExamComm
{
    private $service;

    public function __construct(ExamServ $service)
    {
        $this->service = $service;
    }

    public function execute($arg)
    {
        return $this->service->doSomething($arg);
    }

}