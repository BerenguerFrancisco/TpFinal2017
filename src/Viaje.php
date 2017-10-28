
<?php
namespace TpFinal;
class viaje {
    protected $tipo;
    protected $idtarjeta;
    protected $transporte;
    protected $fecha;
    
    public function __construct ($t,$it,$trans,$f) {
        
        $this->tipo=$t;
        $this->idtarjeta=$it;
        $this->transporte=$trans;
        $this->fecha=$f;
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
    public function devolverTransporte() {
          return $this->fecha;
    }
}

