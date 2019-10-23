<?php

require_once 'Vector.class.php';

class Matrix
{
    const IDENTITY = 1;
    const SCALE = 2;
    const RX = 3;
    const RY = 4;
    const RZ = 5;
    const TRANSLATION = 6;
    const PROJECTION = 7;
    private $_vtcX;
    private $_vtcY;
    private $_vtcZ;
    private $_vtxO;
    public static $verbose = False;

    public static function doc()
    {
        return (file_get_contents("./Matrix.doc.txt")."\n"); 
    }

    public function __construct(array $kwargs)
    {
        if (!isset($kwargs['preset']))
            exit ;
        $preset = $kwargs['preset'];
        if ($preset == Matrix::SCALE && !isset($kwargs['scale']))
            exit ;
        if (($preset == Matrix::RX || $preset == Matrix::RY || $preset == Matrix::RZ) && !isset($kwargs['angle']))
            exit ;
        if ($preset == Matrix::TRANSLATION && !isset($kwargs['vtc']))
            exit ;
        if ($preset == Matrix::PROJECTION && !isset($kwargs['fov']))
            exit ;
        if ($preset == Matrix::PROJECTION && !isset($kwargs['ratio']))
            exit ;
        if ($preset == Matrix::PROJECTION && !isset($kwargs['near']))
            exit ;
        if ($preset == Matrix::PROJECTION && !isset($kwargs['far']))
            exit ;
        if ($preset == Matrix::IDENTITY)
        {
            $vertX = new Vertex(array('x'=>1, 'y'=>0, 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>1, 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>0, 'z'=>1, 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::TRANSLATION)
        {
            $vertX = new Vertex(array('x'=>1, 'y'=>0, 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>1, 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>0, 'z'=>1, 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=> $kwargs['vtc']->_x, 'y'=> $kwargs['vtc']->_y, 'z'=> $kwargs['vtc']->_z, 'w'=> 2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::SCALE)
        {
            $vertX = new Vertex(array('x'=>$kwargs['scale'], 'y'=>0, 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>$kwargs['scale'], 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>0, 'z'=>$kwargs['scale'], 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::RX)
        {
            $vertX = new Vertex(array('x'=>1, 'y'=>0, 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>cos($kwargs['angle']), 'z'=>sin($kwargs['angle']), 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>-sin($kwargs['angle']), 'z'=>cos($kwargs['angle']), 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::RY)
        {
            $vertX = new Vertex(array('x'=>cos($kwargs['angle']), 'y'=>0, 'z'=>-sin($kwargs['angle']), 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>1, 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>sin($kwargs['angle']), 'y'=>0, 'z'=>cos($kwargs['angle']), 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::RZ)
        {
            $vertX = new Vertex(array('x'=>cos($kwargs['angle']), 'y'=>sin($kwargs['angle']), 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>-sin($kwargs['angle']), 'y'=>cos($kwargs['angle']), 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>0, 'z'=>1, 'w'=>1));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0, 'w'=>2));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }
        if ($preset == Matrix::PROJECTION)
        {
            $scale = tan(deg2rad($kwargs['fov'] * 0.5)) * $kwargs['near'];
		    $right = $kwargs['ratio'] * $scale;
		    $left = -$right;
            $vertX = new Vertex(array('x'=> (2 * $kwargs['near']) / (2 * $right), 'y'=>0, 'z'=>0, 'w'=>1));
            $this->_vtcX = new Vector(array('dest'=>$vertX));
            $vertY = new Vertex(array('x'=>0, 'y'=>(2 * $kwargs['near']) / (2 * $scale), 'z'=>0, 'w'=>1));
            $this->_vtcY = new Vector(array('dest'=>$vertY));
            $vertZ = new Vertex(array('x'=>0, 'y'=>0, 'z'=> -(-$kwargs['near'] - $kwargs['far']) / ($kwargs['near'] - $kwargs['far']) , 'w'=> 0));
            $this->_vtcZ = new Vector(array('dest'=>$vertZ));
            $vertW = new Vertex(array('x'=>0, 'y'=>0, 'z'=>((2 * $kwargs['near'] * $kwargs['far']) / ($kwargs['near'] - $kwargs['far'])), 'w'=>1));
            $this->_vtxO = new Vector(array('dest'=>$vertW));
        }

    }

    public function __toString()
    {
        $first_line = "M | vtcX | vtcY | vtzZ | vtx0\n";
        $second_line = "-----------------------------\n";
        $third_line = "x | ".number_format($this->_vtcX->_x, 2)." | ".number_format($this->_vtcY->_x, 2)." | ".number_format($this->_vtcZ->_x, 2)." | ".number_format($this->_vtxO->_x, 2)."\n";
        $fourth_line = "y | ".number_format($this->_vtcX->_y, 2)." | ".number_format($this->_vtcY->_y, 2)." | ".number_format($this->_vtcZ->_y, 2)." | ".number_format($this->_vtxO->_y, 2)."\n";
        $fifth_line = "z | ".number_format($this->_vtcX->_z, 2)." | ".number_format($this->_vtcY->_z, 2)." | ".number_format($this->_vtcZ->_z, 2)." | ".number_format($this->_vtxO->_z, 2)."\n";
        $sixth_line = "w | ".number_format($this->_vtcX->_w, 2)." | ".number_format($this->_vtcY->_w, 2)." | ".number_format($this->_vtcZ->_w, 2)." | ".number_format($this->_vtxO->_w, 2)."\n";
        return ($first_line.$second_line.$third_line.$fourth_line.$fifth_line.$sixth_line);
    }
    public function get_coord($i, $j)
    {
        if ($i = 0)
        {
            if ($j = 0)
                return ($this->_vectX->_x);
            if ($j = 1)
                return ($this->_vectY->_x);
            if ($j = 2)
                return ($this->_vectZ->_x);
            if ($j = 3)
                return ($this->_vtxO->_x);
        }
        if ($i = 1)
        {
            if ($j = 0)
                return ($this->_vectX->_y);
            if ($j = 1)
                return ($this->_vectY->_y);
            if ($j = 2)
                return ($this->_vectZ->_y);
            if ($j = 3)
                return ($this->_vtxO->_y);
        }
        if ($i = 2)
        {
            if ($j = 0)
                return ($this->_vectX->_z);
            if ($j = 1)
                return ($this->_vectY->_z);
            if ($j = 2)
                return ($this->_vectZ->_z);
            if ($j = 3)
                return ($this->_vtxO->_z);
        }
        if ($i = 3)
        {
            if ($j = 0)
                return ($this->_vectX->_w);
            if ($j = 1)
                return ($this->_vectY->_w);
            if ($j = 2)
                return ($this->_vectZ->_w);
            if ($j = 3)
                return ($this->_vtxO->_w);
        }
    }
}
?>