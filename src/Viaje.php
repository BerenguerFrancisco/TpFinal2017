
<?php
namespace TpFinal;
class viaje {
    protected $tipo;
    protected $idtarjeta;
    protected $transporte;
    
    public function __construct ($t,$it,$trans) {
        
        $this->tipo=$t;
        $this->idtarjeta=$it;
        $this->transporte=$trans;
    }
    
    public function devolverTipo() {
        return $this->tipo;
    
    
    }
    
    public function devolverMonto() {
          return $this->monto;
    }
    
    public function devolverTransporte() {
          return $this->transporte;
    }
}

