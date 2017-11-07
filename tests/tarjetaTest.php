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
    
    public function testunviaje() {
        $tarjeta= new tarjeta("15666");
        $bondi= new colectivo("144","Rosario BUS");
        $sal=$tarjeta->saldo();
        $tarjeta->pagar($bondi,"28/10/17 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        
    }
    
    public function test2viajes() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144","Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $tarjeta->pagar($bondi, "2017/10/28 21:20");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
    }
    
    public function testviajesplusspere() {
        $tarjeta= new tarjeta("1231231321");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $tarjeta->vp=1;
        $bondi = new colectivo("144", "Rosario BUS");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-19.5);
        $tarjeta1= new tarjeta("3213213");
        $tarjeta1->cargar(50);
        $sal=$tarjeta1->saldo();
        $tarjeta1->vp=2;
        $tarjeta1->pagar($bondi, "2017/10/28 20:35");
        $this->assertEquals($tarjeta1->saldo(),$sal-29.25);
        
    }
    
    public function testviajeptransbordo() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(10);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144","Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $bondi2= new colectivo("110","Rosariobus");
        $tarjeta->pagar($bondi2, "2017/10/28 21:25");
        $this->assertEquals($tarjeta->vp,1);
    }
    
    public function testxdx() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(10);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144","Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $bondi2= new colectivo("110","Rosariobus");
        $tarjeta->vp=2;
        $this->assertEquals($tarjeta->pagar($bondi2, "2017/10/28 20:35"),"Out of money");  
    }
    
    public function testtransbordo() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144","Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $bondi2= new colectivo("110","Rosariobus");
        $tarjeta->pagar($bondi2, "2017/10/28 21:25");
        $this->assertEquals($tarjeta->saldo(),$sal-3.20);
    }
    
    public function testviajeplus() {
        $tarjeta= new tarjeta("1568");
        $bondi= new colectivo("144","Rosario BUS");
        $tarjeta->pagar($bondi,"28/10/17 20:35");
        $this->assertEquals($tarjeta->vp,1);
        $tarjeta->pagar($bondi,"28/10/17 20:35");
        $this->assertEquals($tarjeta->vp,2);
        $this->assertEquals($tarjeta->pagar($bondi, "2017/10/28 21:38"),"Out of money");
    }
    
    public function testviaje() {
        $tarjeta= new tarjeta("15643");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144","Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 20:35");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $tarjeta->pagar($bondi, "2017/10/28 21:20");
        $this->assertEquals($tarjeta->saldo(),$sal-9.75);
        $sal=$tarjeta->saldo();
        $bondi2= new colectivo("110","Rosariobus");
        $tarjeta->pagar($bondi2, "2017/10/28 21:25");
        $this->assertEquals($tarjeta->saldo(),$sal-3.20);
    }
    public function testtransbordomasviaje() {
        $tarjeta= new tarjeta("8962");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bondi= new colectivo("144", "Rosariobus");
        $bondi2= new colectivo("110", "Rosariobus");
        $tarjeta->pagar($bondi, "2017/10/28 13:01");
        $tarjeta->pagar($bondi2, "2017/10/28 13:21");
        $tarjeta->pagar($bondi2, "2017/10/28 13:22");
        $this->assertEquals($tarjeta->saldo(),$sal-22.7);
    }
    
    public function testalquilerunabici(){
        $tarjeta= new tarjeta("1489");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bike= new bici("156");
        $tarjeta->pagar($bike, "2017/10/31 17:25");
        $this->assertEquals($tarjeta->saldo(),$sal-14.625);
    }   
    
    public function testalquilervariasbicis() {
        $tarjeta= new tarjeta("1515");
        $tarjeta->cargar(50);
        $sal=$tarjeta->saldo();
        $bike= new bici("156456");
        $bike2= new bici("51678789");
        $tarjeta->pagar($bike, "2017/10/31 17:25");
        $tarjeta->pagar($bike2, "2017/10/31 17:45");
        $this->assertEquals($tarjeta->saldo(),$sal-14.625);
    }
    
    public function testalquilersinplata() {
        $tarjet= new tarjeta("4444");
        $bike= new bici("1234");
        $this->assertEquals($tarjet->pagar($bike, "2017/10/28 15:51"),"Out of money");
    }
}
