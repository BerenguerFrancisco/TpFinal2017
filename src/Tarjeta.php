<?php

namespace TpFinal;

class Tarjeta {

    public $sa;
    
    public function saldo() {
        return $this->sa;
    }
    
    public function cargar($p){
        if ($p==272){
            $this->sa=$this->sa+320;
        }
        elseif($p==332){
            $this->sa=$this->sa+388;
        }
        elseif($p==500){
            $this->sa=$this->sa+640;
        }
        else{
            $this->sa=$this->sa+$p;
        }
    }
    
    public function pagar($veh,$hor){
    
    }
    
    
}
