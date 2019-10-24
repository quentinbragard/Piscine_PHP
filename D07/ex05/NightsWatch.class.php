<?php

Class NightsWatch implements IFighter{

    private $army = array();
        function recruit($candidate){
            if ($candidate instanceof IFighter)
                $this->army[] = $candidate;
            }
        function fight(){
            foreach ($this->army as $soldier)
                $soldier->fight();
        }
    }
?>