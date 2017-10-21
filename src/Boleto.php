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
    
}
