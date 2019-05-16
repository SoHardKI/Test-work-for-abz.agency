<?php
require_once "junior.php";

class middle
{
    public $id;
    public $fio;
    public $date_recruitment;
    public $zp;
    public $juniors = array();

    public function __construct($id,$fio,$date_recruitment,$zp)
    {
        $this->id = $id;
        $this->fio = $fio;
        $this->date_recruitment = $date_recruitment;
        $this->zp = $zp;


    }
}

?>
