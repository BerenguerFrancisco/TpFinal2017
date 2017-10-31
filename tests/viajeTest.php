<?php

namespace TpFinal;
use PHPUnit\Framework\TestCase;

class viajeTest extends TestCase {
    public function testTipoCorrecto() {
        $tipos=['Normal', 'Plus', 'Medio','Trasbordo','Medio Trasbordo','Gratis'];
        
        $bondi = new colectivo('144','Rosario BUS');
        $tarjeta= new tarjeta("1564");
        $viaje= new viaje('Normal',$tarjeta,$bondi,'31/10,17 12:02');
        
        $this->assertContains($viaje->devolverTipo(),$tipos);
        
        $this->assertEquals($viaje->devolverTransporte()->linea,$bondi->linea);
        
        $this->assertEquals($viaje->devolverMonto(),9.75);
        
        $this->assertEquals($viaje->devolverTransporte()->linea,$bondi->linea);
    }
}
