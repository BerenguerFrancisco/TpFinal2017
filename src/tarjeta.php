<?php
namespace TpFinal;
class tarjeta {
    public $sa;
    public $vp;
    public $id;
    public $viajesrealizados = array();
    
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
    
    public function pagar($veh,$fec){
        $fec = strtotime($fec);
        if ($veh instanceof bici)
            {if ($this->sa<9.75){
                echo "No tenes más platula ni más viajes plus papu, bajate del colectivo y despedite de tu cuenta\n";
            }
            if ($this->sa>9.75){
                $this->sa=$this->sa-9.75;
                array_unshift(($this->viajesrealizados), new viaje($fec, "Normal", "Bici", $this->id));
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
            array_unshift(($this->viajesrealizados), new viaje($fec, "normal", "Colectivo", $this->id));
            $bol = new boleto($fec, "normal", $this->sa, $veh->linea, $this->id);
            $bol->imprimirboleto();    
            }
            if($this->sa<9.75){
                $this->sa=$this->sa-9.75;
                if ($this->vp!=2){
                    $this->vp=$this->vp+1;       
                    array_unshift(($this->viajesrealizados), new viaje($fec, "plus", "Colectivo", $this->id));
                    $bol = new boleto($fec, "normal", $this->sa, $veh->linea, $this->id);
                    $bol->imprimirboleto(); 
                }
                else{
                    echo "No tiene saldo ni viajes plus";    
                }
            }
            
        }
    
    }
}
