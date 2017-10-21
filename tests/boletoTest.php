<?php
namespace TpFinal;
use PHPUnit\Framework\TestCase;
class EstacionTest extends TestCase {
    /**
     * Comprueba que los datos del boleto sean correcto
     */
    public function testTipoCorrecto() {
        $boleto = new boleto('11/04/17','Plus',200,'144 Negro',1202010);
        $this->assertContains($boleto->tipo, ['Normal', 'Plus', 'Medio']);
    }
}
