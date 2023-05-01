<?php

namespace App\Temp;

class ExamServ
{
    private $param1;
    private $param2;

    public function __construct($param1, $param2)
    {
        $this->param1 = $param1;
        $this->param2 = $param2;
    }

    public function doSomething($args){ return 'suck your self!'; }
    public function nonMock($args){ return $this->doSomething($args); }
}