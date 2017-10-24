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
             $this->vp=0;
        }
        elseif($p==332){
            $this->sa=$this->sa+388;
             $this->vp=0;
        }
        elseif($p==500){
            $this->sa=$this->sa+640;
             $this->vp=0;
        }
        else{
            $this->sa=$this->sa+$p;
             if ($this->vp==1 && $p>=10){
             $this->vp=0;
             }
            ifelse($this->vp==2 && $p>=20){
            $this->vp=0;
            }
        }
        
        if ($this->vp==1){
            $this->sa=$this->sa-9.75;
            $this->vp=0;
        }
        if ($this->vp==2){
            $this->sa=$this->sa-(9.75*2);
            $this->vp=0; 
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
        { if ($veh instanceof bici)
            {if 
          $this->sa=$this->sa-9.75;
        }
    
    
}
