<?php

class team_lead
{
    public $id;
    public $fio;
    public $date_recruitment;
    public $zp;
    public $seniors = array();

    public function __construct($id,$fio,$date_recruitment,$zp)
    {
        $this->id = $id;
        $this->fio = $fio;
        $this->date_recruitment = $date_recruitment;
        $this->zp = $zp;


    }


}





?>
