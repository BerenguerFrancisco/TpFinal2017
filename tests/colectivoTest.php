<?php
namespace TpFinal;
use PHPUnit\Framework\TestCase;

class colectivoTest extends TestCase {
    /**
     * Comprueba que los datos del colectivo sean correcto
     */

    public function testLineaCorrecta() {
         $lineas = [
        '101',
        '102',
        '103',
        '106',
        '107',
        '110',
        '112',
        '113',
        '115',
        '116',
        '120',
        '121',
        '122',
        '123',
        '125',
        '126',
        '127',
        '128',
        '129',
        '130',
        '131',
        '132',
        '133',
        '134',
        '135',
        '136',
        '137',
        '138',
        '139',
        '140',
        '141',
        '142',
        '143',
        '144',
        '145',
        '146',
        '153',
        'OESTE',
        'IRIGOYEN',
        'NOROESTE',
        'IBARLUCEA',
        'LUCIA',
        'SUR',
        'K',
        'COSTA',
        'Q',
        'SUR',
        'CENTRO',
        ];
        $bondi = new colectivo('144','Rosario BUS');
        $this->assertContains($bondi->linea,$lineas);
        $this->assertContains($bondi->empresa,['Rosario BUS','EMTR']);
    }
}
