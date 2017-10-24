<?php
namespace TpFinal;
class colectivo {

    public $linea;
    
    public function __construct ($l) {
        
        $this->linea=$l;
    }
    public function imprimirLinea {
        echo "<li> Linea: ".$this->linea;

    } 
}
