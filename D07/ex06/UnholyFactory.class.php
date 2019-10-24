<?php

class UnholyFactory
{
    public $existing_soldiers = array();
    public function absorb($soldier)
    {
        $soldier_type = $soldier->soldier_desc['type'];
        if (get_parent_class($soldier) == "Fighter")
        {
            if (in_array($soldier, $this->existing_soldiers))
                print("(Factory already absorbed a fighter of type ".$soldier_type.")\n");
            else
            {
                array_push($this->existing_soldiers, $soldier);
                print("(Factory absorbed a fighter of type ".$soldier_type.")\n");
            }
        }
        else
            print("(Factory can't absorb this, it's not a fighter)\n");        
    }

    public function fabricate($soldier)
    {
        foreach($this->existing_soldiers as $type_of_soldier)
        {
            if (in_array($soldier, $type_of_soldier->soldier_desc))
            {
                print("(Factory fabricates a fighter of type ".$type_of_soldier->soldier_desc['type'].")\n");
                $fighter = new $type_of_soldier->soldier_desc['class'];
                return ($fighter);
            }
        }
        print("(Factory hasn't absorbed any fighter of type ".$soldier.")\n");
        return (NULL);
    }
}

?>