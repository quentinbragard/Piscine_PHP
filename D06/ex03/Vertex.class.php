<?php

require_once 'Color.class.php';

class Vertex
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 1.0;
    private $_color;
    public static $verbose = False;

    public static function doc()
    {
        return (file_get_contents("./Vertex.doc.txt")."\n"); 
    }

    public function __construct(array $kwargs)
    {
        if (count($kwargs) < 3 || count($kwargs) > 5)
            exit ;
        if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z']))
        {
            $this->_x = floatval($kwargs['x']);
            $this->_y = floatval($kwargs['y']);
            $this->_z = floatval($kwargs['z']);
        }
        else
            exit ;
        if (isset($kwargs['w']))
            $this->_w = floatval($kwargs['w']);
        if (isset($kwargs['color']) && $kwargs['color'] instanceof Color)
            $this->_color = $kwargs['color'];
        else
            $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
            if (self::$verbose == TRUE)
                print ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." ,".$this->_color." ) constructed\n");
    }

    public function __destruct()
    {
        if (self::$verbose == TRUE)
            print ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." ,".$this->_color." ) destructed\n");
    }

    public function __toString()
    {
        if (self::$verbose === False)
            return ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." )");
        else
        return ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." ,".$this->_color." )");
    }

    private function getX(){
        return $this->_x;
    }

    private function getY(){
        return $this->_y;
    }

    private function getZ(){
        return $this->_z;
    }

    private function getW(){
        return $this->_w;
    }

    private function getColor(){
        return $this->_Color;
    }

    private function setX($x){
        $this->_x = $x;
    }

    private function setY($y){
        $this->_y = $y;
    }
    
    private function setZ($z){
        $this->_z = $z;
    }
    
    private function setW($w){
        $this->_w = $w;
    }
    
    private function setColor($color){
        $this->_color = $color;
    }

    public function __get($attr){
        if ($attr == '_x')
            return($this->getX());
        if ($attr == '_y')
            return($this->getY());
        if ($attr == '_z')
            return($this->getZ());
        if ($attr == '_w')
            return($this->getW());
        if ($attr == '_color')
            return($this->getColor());
    }

    public function __set($attr, $value){
        if ($attr == '_x')
            $this->setX($value);
        if ($attr == '_y')
            $this->setY($value);
        if ($attr == '_z')
            $this->setZ($value);
        if ($attr == '_w')
            $this->setW($value);
        if ($attr == '_color')
            $this->setColor($value);
        }
}
?>