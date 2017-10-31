<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class tarjetaTest extends TestCase {

    /**
     * Comprueba que el saldo de una tarjeta nueva sea cero.
     */
    public function testSaldoCero() {
        $tarjeta= new tarjeta("1564");
        $this->assertEquals($tarjeta->saldo(), 0);
    }
    
    public function carga50() {
        $tarjeta= new tarjeta("564");
        $tarjeta->cargar(50);
        $this->assertEquals($tarjeta->saldo(),50);
    }
    public function carga332() {
        $tarjeta= new tarjeta("561");
        $tarjeta->cargar(332);
        $this->assertEquals($tarjeta->saldo(),388);
    }
    
    public function viaje() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new Colectivo(144,"Rosariobus");
        $tarjeta->pagar($bondi, "28/10/17 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
}
}
