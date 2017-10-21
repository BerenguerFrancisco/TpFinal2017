<?php
namespace TpFinal;
class colectivo {

    public $linea;
    
    public function __construct ($l) {
        
        $this->fecha=$f;
        $this->tipo=$t;
        $this->saldo=$s;
        $this->linea=$l;
        $this->id=$i;
    }
    public function imprimirBoleto {
        
        echo "<li> Fecha: ".$this->fecha;
        echo "<li> Viaje ".$this->tipo;
        echo "<li> Saldo: ".$this->saldo;
        echo "<li> Linea: ".$this->linea;
        echo "<li> Id tarjeta: ".$this->id;
    } 
}
