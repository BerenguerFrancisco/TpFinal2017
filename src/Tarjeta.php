<?php

namespace TpFinal;

class tarjeta {

    public $sa;
    public $vp;
    
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
        
        if ($this->vp==1){
            $this->sa=$this->sa-9.75;
        }
        if ($this->vp==2){
            $this->sa=$this->sa-(9.75*2);
        }
    }
    
    public function pagar($veh,$hor){
        if ($this->sa<9.75){
            if($this->vp<2){
                $this->vp=$this->vp+1;
            }
            else
            {echo "No tenes más platula ni más viajes plus papu, bajate del colectivo y despedite de tu cuenta\n";
            }
           
        }
        else
        { $this->sa=$this->sa-9.75;
        }
    
    
}
