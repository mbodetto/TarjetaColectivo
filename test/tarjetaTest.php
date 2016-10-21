<?php

namespace Tarjeta;

class TarjetaTest extends \PHPUnit_Framework_TestCase {
  	protected $tarjeta,$colectivoA,$colectivoB,$medio,$bici;	
  	
	public function setup(){
		$this->tarjeta = new Tarjeta(10);
		$this->colectivoA = new Colectivo("153 Negro", "Rosario Bus");
  		$this->colectivoB = new Colectivo("135", "Rosario Bus");
		$this->bici = new Bicicleta("444");

	}	

	public function testCargaSaldo() {
    		$this->tarjeta->recargar(272);
    		$this->assertEquals($this->tarjeta->saldo(), 320, "Cuando cargo 272 tengo que tener 320");
    		$this->tarjeta = new Tarjeta(11);
    		$this->tarjeta->recargar(500);
    		$this->assertEquals($this->tarjeta->saldo(), 640, "Cuando cargo 500 tengo que tener 640");
  	}

	public function testPagando(){
		$this->tarjeta->recargar(40);
  		$this->tarjeta->pagar($this->colectivoA, "2016/04/4 10:50");
		$this->assertEquals($this->tarjeta->pagar($this->colectivoA, "2016/04/4 10:50")->getTipo(),"Normal", "Debe devolver boleto tipo Normal");
  		$this->assertEquals($this->tarjeta->saldo(), 32, "Cargue 40, menos lo que sale el colectivo 32");
	}
	
	 public function testTransbordo() {
  		$this->tarjeta->recargar(272);
  		$this->tarjeta->pagar($this->colectivoA, "2016/04/30 14:10");
  		$this->tarjeta->pagar($this->colectivoB, "2016/04/30 14:50");
  		$this->assertEquals($this->tarjeta->saldo(), 309.36, "Si tengo 312 y pago un colectivo con transbordo tengo que tener 309.36");
  	}
	
  	public function testNoTransbordo() {
  		$this->tarjeta->recargar(272);
  		$this->tarjeta->pagar($this->colectivoA, "2010/06/20 10:01");
   		$this->tarjeta->pagar($this->colectivoB, "2016/04/30 22:22");
  		$this->assertEquals($this->tarjeta->saldo(), 304, "Si tengo 312 y pago un colectivo sin transbordo tengo que tener 304");
 
  	}
	
	public function testPagarBici() {
    		$this->tarjeta->recargar(272);
    		$this->tarjeta->pagar($this->bici, "1997/02/22 20:40");
    		$this->assertEquals($this->tarjeta->saldo(), 308, "Si tengo 320 y pago una bici tengo que tener 308");
  	}

}

?>
