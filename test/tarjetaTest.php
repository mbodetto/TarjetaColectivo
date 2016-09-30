<?php

namespace Tarjeta;

class TarjetaTest extends \PHPUnit_Framework_TestCase {
  protected $tarjeta,$colectivoA,$colectivoB,$medio,$bici;	
  public function setup(){
	$this->tarjeta = new Tarjeta();
	$this->colectivoA = new Colectivo("153 Negro", "Rosario Bus");
  	$this->colectivoB = new Colectivo("135", "Rosario Bus");
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
