<?php
namespace TpFinal;
class boleto {
    
    public $fecha;
    public $tipo;
    public $saldo;
    public $linea;
    public $id;
    
    public function __construct ($f,$t,$s,$l,$i) {
        
        $this->fecha=$f;
        $this->tipo=$t;
        $this->saldo=$s;
        $this->linea=$l;
        $this->id=$i;
    }
    public function imprimirBoleto() {
        
        echo "<li> Fecha: ".$this->fecha;
        echo "<li> Viaje ".$this->tipo;
        echo "<li> Saldo: ".$this->saldo;
        echo "<li> Linea: ".$this->linea;
        echo "<li> Id tarjeta: ".$this->id;
    } 
}
