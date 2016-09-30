<?php

namespace Tarjeta;

class TarjetaTest extends \PHPUnit_Framework_TestCase {
  protected $tarjeta,$colectivoA,$colectivoB,$medio,$bici;	
  public function setup(){
	$this->tarjeta = new Tarjeta();
      	$this->medio = new Medio();
	$this->colectivoA = new Colectivo("144 Negro", "Rosario Bus");
  	$this->colectivoB = new Colectivo("135", "Rosario Bus");
      	$this->biciA = new Bicicleta("323");
      	$this->biciB = new Bicicleta("111");
  }	
  public function testCargaSaldo() {
    	$this->tarjeta->recargar(272);
    	$this->assertEquals($this->tarjeta->saldo(), 320, "Cuando cargo 272 deberia tener finalmente 320");
    	$this->tarjeta = new Tarjeta();
    	$this->tarjeta->recargar(500);
    	$this->assertEquals($this->tarjeta->saldo(), 640, "Cuando cargo 500 deberia tener finalmente 640");
  }
}
?>
