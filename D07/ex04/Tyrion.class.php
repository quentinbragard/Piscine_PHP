<?php

Class Tyrion extends Lannister{
    function who($p){
        if (get_parent_class($p) !== "Lannister")
            return "Let's do this";
        else
            return "Not even if I'm drunk !";
    }
}
