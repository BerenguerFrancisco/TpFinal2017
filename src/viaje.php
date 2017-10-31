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
        $this->monto=$this->calcularMonto();
        
       
    }
    public function calcularMonto(){
        
        if($this->tipo=='Normal'){
            return 9.75;
        }
        if($this->tipo=='Plus' ||$this->tipo=='Gratis'){
            return 0;
        }
        if($this->tipo=='Trasbordo'){
            return 3.20;
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

