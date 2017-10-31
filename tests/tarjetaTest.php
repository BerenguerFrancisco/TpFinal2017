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
    
    public function testcarga50() {
        $tarjeta= new tarjeta("564");
        $tarjeta->cargar(50);
        $this->assertEquals($tarjeta->saldo(),50);
    }
    public function testcarga332() {
        $tarjeta= new tarjeta("561");
        $tarjeta->cargar(332);
        $this->assertEquals($tarjeta->saldo(),388);
    }
    
    public function testcarga272() {
        $tarjeta= new tarjeta("5616");
        $tarjeta->cargar(272);
        $this->assertEquals($tarjeta->saldo(),320);
    }
    
    public function testcarga500() {
        $tarjeta= new tarjeta("56165");
        $tarjeta->cargar(500);
        $this->assertEquals($tarjeta->saldo(),640);
    }
    
    public function testcarga624() {
        $tarjeta= new tarjeta("561658");
        $tarjeta->cargar(624);
        $this->assertEquals($tarjeta->saldo(),776);
    }
    
    public function testviajeplus() {
        $tarjeta= new tarjeta("1568");
        $bondi= new colectivo(144,"Rosario BUS");
        $tarjeta->pagar($bondi,"28/10/17 20:35");
        $this->assertEquals($tarjeta->vp,1);
        $tarjeta->pagar($bondi,"28/10/17 20:35");
        $this->assertEquals($tarjeta->vp,2);
        $this->assertEquals($tarjeta->pagar($bondi2, "28/10/17 21:38"),"Out of money");
    }
    
    public function testviaje() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo(144,"Rosariobus");
        $tarjeta->pagar($bondi, "28/10/17 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $tarjeta->pagar($bondi, "28/10/17 21:20");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $bondi2= new colectivo(110,"Rosariobus");
        $tarjeta->pagar($bondi2, "28/10/17 21:25");
        $this->assertEquals($tarjeta->saldo(),$sal-3.20);
    }
    public function testtransbordomasviaje() {
        $tarjeta= new tarjeta("8962");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo(144, "Rosariobus");
        $bondi2= new colectivo(110, "Rosariobus");
        $tarjeta->pagar($bondi, "31/10/17 13:01");
        $tarjeta->pagar($bondi2, "31/10/17 13:21");
        $tarjeta->pagar($bondi2, "31/10/17 13:22");
        $this->assertEquals($tarjeta->saldo(),$sal-22.7);
    }
}
