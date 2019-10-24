<?php

Class Jaime extends Lannister{
    function who($p){
        if (get_parent_class($p) !== "Lannister")
            return "Let's do this";
        else if (get_class($p) === "Cersei")
            return "With pleasure, but only in a tower in Winterfell, then.";
        else
            return "Not even if I'm drunk !";
    }
}
