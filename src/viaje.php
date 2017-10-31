<?php
namespace TpFinal;

class viaje {
    protected $tipo;
    public $tarjeta;
    public $idTarjeta;
    protected $transporte;
    protected $fecha;
    protected $monto;
    
    public function __construct ($t,$tar,$trans,$f) {
        
        $this->tipo=$t;
        $this->tarjeta=$tar;
        $this->idTarjeta=$tar->id;
        $this->transporte=$trans;
        $this->fecha=$f;
       
    }
    public function calcularMonto(){
        
        if($this->tipo=='Normal'){
            $this->monto=9.75;
        }
        if($this->tipo=='Plus' ||$this->tipo=='Gratis'){
            $this->monto=0;
        }
        if($this->tipo=='Medio'){
            $this->monto=4.85;
        }
        if($this->tipo=='Trasbordo'){
            $this->monto= 3.20;
        }
        if($this->tipo=='Medio Trasbordo'){
            $this->monto=1.60;
        }
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
    public function devolverFecha() {
          return $this->fecha;
    }
}

