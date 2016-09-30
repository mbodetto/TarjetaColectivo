<?php

namespace Tarjeta;

class TarjetaTest extends \PHPUnit_Framework_TestCase {
  protected $tarjeta,$medio,$colectivo1,$colectivo2,$bici10;	

  public function setup(){
    $this->tarjeta = new Tarjeta();
    $this->medio = new Medio();
    $this->colectivo1 = new Colectivo("144 Rojo", "Rosario Bus");
    $this->colectivo2 = new Colectivo("35 Verde", "Rosario Bus");
    $this->bici10 = new Bicicleta("10");
  }	

  public function testCargandoTarjeta() {
    $this->tarjeta->recargar(272);
    $this->assertEquals($this->tarjeta->saldo(), 320, "Cuando cargo 272 tendría que tener 320 pesos");
   
  }
}

?>
