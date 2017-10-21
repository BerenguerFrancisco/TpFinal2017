<?php
namespace TpFinal;
use PHPUnit\Framework\TestCase;
class EstacionTest extends TestCase {
    /**
     * Comprueba que los datos del boleto sean correcto
     */
    public function testTipoCorrecto() {
        $boleto = new boleto;
        $this->assertContains($boleto->tipo, ["Normal, Plus, Medio"]);
    }
}
