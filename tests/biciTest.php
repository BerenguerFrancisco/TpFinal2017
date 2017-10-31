<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class biciTest extends TestCase {

    public function testTipoCorrecto() {
        $bici = new bici(1202010);
        $this->assertEquals($bici->id,1202010);
    }
}
