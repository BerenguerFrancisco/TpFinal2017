<?php

namespace TpFinal;

class tarjeta {

    public $sa;
    public $vp;
    public $id;
    public $bol;
    public $viajesrealizados;
    
    public function __construct($id){
        $this->id=$id;
        $this->sa=0;
        $this->vp=0;
    }
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
        elseif($p==624){
            $this->sa=$this->sa+776;
        }
        else{
            $this->sa=$this->sa+$p;
        }
    }
    
    public function pagar($veh,$hor){
        if ($veh instanceof bici)
            {
            if ($this->sa<9.75){
            {echo "No tenes más platula ni más viajes plus papu, bajate del colectivo y despedite de tu cuenta\n";
            }
            if ($this->sa>9.75){
                 $this->sa=$this->sa-9.75;
            }
        }
        elseif ($veh instanceof colectivo){
            if($this->sa>9.75){
                $this->sa=$this->sa-9.75;
            if ($this->vp==1){
                $this->sa=$this->sa-9.75;
                $this->vp=0; }       
            if ($this->vp==2){
                $this->sa=$this->sa-(9.75*2);
                $this->vp=0; 
                }
            $this->bol=$this->bol+1;
            $this->viajesrealizados($this->bol)=new boleto($hor, "normal", $this->sa, $veh->linea, $this->id);    
            }
            if($this->sa<9.75){
                $this->sa=$this->sa-9.75;
                if ($this->vp!=2){
                    $this->vp=$this->vp+1;       
                    $this->bol=$this->bol+1;
                    $this->viajesrealizados($this->bol)=new boleto($hor, "plus", $this->sa, $veh->linea, $this->id);}
                else{
                    echo "No tiene saldo ni viajes plus";    
                }
            }
            
        }
    
    
}
}