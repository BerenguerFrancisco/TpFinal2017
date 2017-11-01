<?php
namespace TpFinal;
class tarjeta {
    public $sa;
    public $vp;
    public $id;
    public $viajesrealizados = array();
    public $dia=0;
    public $coldia;
    public $colult;
    
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
        if ($veh instanceof bici){
            if ($this->sa<14.625){
                return "Out of money";
            }
            else{
                if(($fec-$this->dia)>86400){
                    $this->sa=$this->sa-14.625;
                    $this->dia = $fec;
                    array_unshift(($this->viajesrealizados), new viaje( "Normal",$this, "Bici",$fec));
                }
                else {
                    array_unshift(($this->viajesrealizados), new viaje("Gratis",$this, "Bici",$fec));
                }
            }
        }
        elseif ($veh instanceof colectivo){
            if(is_null($this->colult)){
                if($this->sa>9.75){
                    $this->sa=$this->sa-9.75;
                    if ($this->vp==1){
                        $this->sa=$this->sa-9.75;
                        $this->vp=0; }       
                    if ($this->vp==2){
                        $this->sa=$this->sa-(9.75*2);
                        $this->vp=0; 
                    }
                    array_unshift(($this->viajesrealizados), new viaje( "Normal",$this, "Colectivo",$fec));
                    $bol = new boleto($fec, "normal", $this->sa, $veh->linea, $this->id);
                    $bol->imprimirboleto();
                    $this->colult=$veh;
                    $this->coldia=$fec;     
                }
                if($this->sa<9.75){
                    $this->sa=$this->sa-9.75;
                    if ($this->vp!=2){
                        $this->vp=$this->vp+1;       
                        array_unshift(($this->viajesrealizados), new viaje( "Plus",$this, "Colectivo",$fec ));
                        $bol = new boleto($fec, "normal", $this->sa, $veh->linea, $this->id);
                        $bol->imprimirboleto();
                        $this->colult=$veh;
                        $this->coldia=$fec; 
                    }
                    else{
                        echo "No tiene saldo ni viajes plus";    
                    }
                }
            }
            elseif($this->colult->linea != $veh->linea && ($fec-$this->coldia)<3600){
                if($this->sa < 3.20 && $this->vp!=2){
                    array_unshift(($this->viajesrealizados), new viaje("Plus",$this, "Colectivo", $fec));
                    $this->colult=$veh;
                    $this->coldia=$fec;
                }
                elseif($this->sa <3.20 && $this->vp==2){
                    return "Out of money";
                }
                else{
                    $this->sa = $this->sa - 3.20;
                    array_unshift(($this->viajesrealizados), new viaje("Transbordo",$this, "Colectivo",$fec ));
                    $this->colult=$veh;
                    $this->coldia=$fec;
                }    
            }
            else {
                if($this->sa < 9.75 && $this->vp!=2){
                    array_unshift(($this->viajesrealizados), new viaje( "Plus",$this, "Colectivo",$fec ));
                    $this->vp=$this->vp+1;
                    $this->colult=$veh;
                    $this->coldia=$fec;
                }
                elseif($this->sa < 9.75 && $this->vp==2){
                    return "Out of money";
                }
                else{
                    $this->sa = $this->sa-9.75;
                    array_unshift(($this->viajesrealizados), new viaje( "Normal",$this, "Colectivo",$fec ));
                    $this->colult=$veh;
                    $this->coldia=$fec;
                }
            }    
            
        }
    
    }
}
