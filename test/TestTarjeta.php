<?php

namespace Tarjeta;

use PHPUnit\Framework\TestCase;

class TestTarjeta extends TestCase {

  public function testCarga1() {
    $tarjeta = new Sube;
    $tarjeta->recargar(272);
    $this->assertEquals($tarjeta->saldo(), 320, "Cuando cargo 272 deberia tener finalmente 320");
  }

  public function testCarga2() {
    $tarjeta = new Sube;
    $tarjeta->recargar(100);
    $this->assertEquals($tarjeta->saldo(), 100); 
  }
}
