<?php

Class Color
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = False;

    public static function doc()
    {
        return (file_get_contents("./Color.doc.txt")."\n"); 
    }

    public function __construct(array $kwargs)
    {
        if (count($kwargs) == 1 && isset($kwargs['rgb']))
        {
            $this->blue = intval(abs($kwargs['rgb']) % 256);
            $this->green = intval(((abs($kwargs['rgb']) - $this->blue) / 256) % 256);
            $this->red = intval(((abs($kwargs['rgb']) - $this->blue) / (256 * 256)) - ($this->green / 256));
            if (self::$verbose == True)
                print($this." constructed.\n");
        }
        else if (count($kwargs) == 3 && isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue']))
        {
            $this->red = intval(abs($kwargs['red']) % 256);
            $this->green = intval(abs($kwargs['green']) % 256);
            $this->blue = intval(abs($kwargs['blue']) % 256);
            if (self::$verbose === True)
                print($this." constructed.\n");
        }
        else 

        return ;
    }

    public function __destruct()
    {
        if (self::$verbose === True)
            print($this." destructed.\n");;
        return ;
    }

    public function __toString()
    {
        return ("Color( red: ".$this->red.", green: ".$this->green.", blue: ".$this->blue." )");
    }

    public function add(Color $col)
    {
        $red = ($this->red + $col->red) % 256;
        $green = ($this->green + $col->green) % 256;
        $blue = ($this->blue + $col->blue) % 256;
        $ret = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
        return ($ret);
    }

    public function sub(Color $col)
    {
        $red = ($this->red - $col->red) % 256;
        $green = ($this->green - $col->green) % 256;
        $blue = ($this->blue - $col->blue) % 256;
        $ret = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
        return ($ret);
    }

    public function mult($scal)
    {
        $red = ($this->red * abs($scal)) % 256;
        $green = ($this->green * abs($scal)) % 256;
        $blue = ($this->blue * abs($scal)) % 256;
        $ret = new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
        return ($ret);
    }
}

?>