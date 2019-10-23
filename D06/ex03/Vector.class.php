<?php

require_once 'Vertex.class.php';

class Vector
{
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 0.0;
    public static $verbose = False;

    public static function doc()
    {
        return (file_get_contents("./Vector.doc.txt")."\n"); 
    }

    public function __construct(array $kwargs)
    {

        if (isset($kwargs['orig']) && $kwargs['orig'] instanceof Vertex)
            $origin = clone $kwargs['orig'];
        else
            $origin = new Vertex(array(x=>0, y=>0, z=>0, w=>1));
        if (isset($kwargs['dest']) &&  $kwargs['dest'] instanceof Vertex)
        {
            $this->_x = $kwargs['dest']->_x - $origin->_x;
            $this->_y = $kwargs['dest']->_y - $origin->_y;
            $this->_z = $kwargs['dest']->_z - $origin->_z;
            $this->_w = $kwargs['dest']->_w - $origin->_w;
        }
        if (self::$verbose === True)
            print("Vector( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." constructed)\n");
    }

    public function __destruct()
    {
        if (self::$verbose === True)
            print("Vector( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." destructed)\n");
    }

    public function __toString()
    {
        return ("Vector( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z: ".number_format($this->_z, 2).", w: ".number_format($this->_w, 2)." )");
    }

    private function getX()
    {
        return $this->_x;
    }

    private function getY()
    {
        return $this->_y;
    }

    private function getZ()
    {
        return $this->_z;
    }

    private function getW()
    {
        return $this->_w;
    }

    public function __get($attr)
    {
        if ($attr == '_x')
            return($this->getX());
        if ($attr == '_y')
            return($this->getY());
        if ($attr == '_z')
            return($this->getZ());
        if ($attr == '_w')
            return($this->getW());
    }


    public function magnitude()
    {
        return (sqrt(bcpow($this->_x, 2, 2) + bcpow($this->_y, 2, 2) + bcpow($this->_z, 2, 2)  ));
    }


    public function normalize()
    {
        $mag = $this->magnitude();
        if ($mag == 1)
            return (clone $this);
        else
        {
            $new_vertex = new Vertex(array('x'=>$this->_x / $mag, 'y'=>$this->_y / $mag, 'z'=>$this->_z / $mag, 'w'=>$this->_w / $mag));
            return (new Vector(array('dest'=>$new_vertex)));
        }
    }

    public function add(Vector $rhs)
    {
       $dest = new Vertex(array('x'=>$this->_x + $rhs->_x, 'y'=>$this->_y + $rhs->_y, 'z'=>$this->_z + $rhs->_z));
       return (new Vector(array('dest'=>$dest)));
    }

    public function sub(Vector $rhs)
    {
       $dest = new Vertex(array('x'=>$this->_x - $rhs->_x, 'y'=>$this->_y - $rhs->_y, 'z'=>$this->_z - $rhs->_z));
       return (new Vector(array('dest'=>$dest)));
    }

    public function opposite()
    {
       $dest = new Vertex(array('x'=> 0 - $this->_x, 'y'=>0 - $this->_y, 'z'=>0 - $this->_z));
       return (new Vector(array('dest'=>$dest)));
    }

    public function scalarProduct($k)
    {
       $dest = new Vertex(array('x'=> $k * $this->_x, 'y'=> $k *  $this->_y, 'z' => $k *  $this->_z));
       return (new Vector(array('dest'=>$dest)));
    }

    public function dotproduct($vtc2)
    {
        return ($this->_x * $vtc2->_x + $this->_y * $vtc2->_y + $this->_z * $vtc2->_z);
    }

    public function cos($vtc2)
    {
        return ((($this->_x * $vtc2->_x) + ($this->_y * $vtc2->_y)) / ((sqrt($this->_x * $this->_x + $this->_y * $this->_y) * sqrt($vtc2->_x * $vtc2->_x + $vtc2->_y * $vtc2->_y))));
    }

    public function crossProduct($vtc2)
    {
        $dest = new Vertex(array('x' => ($this->_y * $vtc2->_z - $this->_z * $vtc2->_y), 'y' => ($this->_z * $vtc2->_x) - ($this->_x * $vtc2->_z), 'z' => ($this->_x * $vtc2->_y) - ($this->_y * $vtc2->_x)));
       return (new Vector(array('dest'=>$dest)));        
    }

}
?>