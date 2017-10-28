
<?php
namespace TpFinal;
class colectivo {
    public $linea;
    public $empresa;
    public function __construct ($l,$e) {
        
        $this->linea=$l;
        $this->empresa=$e;
    }
    public function imprimirLinea {
        echo "<li> Linea: ".$this->linea;
    } 
}
