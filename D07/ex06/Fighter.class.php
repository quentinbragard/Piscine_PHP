<?php

abstract class Fighter
{
    public $soldier_desc = array();
    public function __construct($solidertype)
    {
        $this->soldier_desc['type'] = $solidertype;
        $this->soldier_desc['class'] = get_class($this);
    }
    abstract public function fight($soldier);
}

?>