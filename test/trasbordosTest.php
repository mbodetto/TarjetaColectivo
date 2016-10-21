<?php

namespace Tarjeta;

class TransbordoTest extends \PHPUnit_Framework_TestCase {
  protected $tarjeta,$colectivoA,$colectivoB,$medio;	
  
  public function setup(){
	$this->tarjeta = new Tarjeta(10);
    	$this->medio = new MedioBoleto();
	$this->colectivoA = new Colectivo("666 Rojo", "Rosario Bus");
  	$this->colectivoB = new Colectivo("35 Verde", "Rosario Bus");
  }
  
  // NORMAL
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
  
  // MEDIO BOLETO
  public function testMedioTransbordo() {
    $this->medio->recargar(272);
    $this->medio->pagar($this->colectivoA, "2016/12/31 23:30");
    $this->medio->pagar($this->colectivoB, "2016/12/31 23:59");
    $this->assertEquals($this->medio->saldo(), 314.68, "Si tengo 312 y pago un colectivo con transbordo y medio boleto tengo que tener 314.68");
  }
  public function testMedioNoTransbordo() {
    $this->medio->recargar(272);
    $this->medio->pagar($this->colectivoA, "2016/12/24 10:50");
    $this->medio->pagar($this->colectivoB, "2347/12/10 10:00");
    $this->assertEquals($this->medio->saldo(), 312, "Si tengo 312 y pago un colectivo sin transbordo y medio boleto tengo que tener 312");
  }
  
}
?>
