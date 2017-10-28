
<?php
namespace TpFinal;
class viaje {
    protected $tipo;
    protected $idtarjeta;
    protected $transporte;
    
    public function __construct ($t,$it,$trans) {
        
        $this->tipo=$t;
        $this->idtarjeta=$it;
        $this->transporte=$trans
    }
    public function devolverTipo() {
    
    
    }
    public function devolverMonto() {
    }
    public function devolverTransporte() {
    }
 

}
 tipo(); // Devuelve en colectivo →
monto(); // Devuelve el monto del viaje →
 tranporte()->nombre(); // Devuelve el nombre de la linea o de la bici →
que se utilizó
