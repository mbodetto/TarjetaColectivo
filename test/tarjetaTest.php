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
    		$this->assertEquals($this->tarjeta->saldo(), 320, "Cuando cargo 272 tengo que tener 320");
    		$this->tarjeta = new Tarjeta();
    		$this->tarjeta->recargar(500);
    		$this->assertEquals($this->tarjeta->saldo(), 640, "Cuando cargo 500 tengo que tener 640");
  	}

	public function testPagando(){
		$this->tarjeta->recargar(40);
  		$this->tarjeta->pagar($this->colectivoA, "2016/04/4 10:50");
  		$this->assertEquals($this->tarjeta->saldo(), 32, "Cargue 40, menos lo que sale el colectivo 32");
	}

}

?>
