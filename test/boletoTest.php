<?php

namespace Tarjeta;

class BoletoTest extends \PHPUnit_Framework_TestCase {
  protected $tarjeta,$colectivoA,$colectivoB,$medio;	
  public function setup(){
			$this->tarjeta = new Tarjeta(1);
		  $this->colectivoA = new Colectivo("153 Negro", "Rosario Bus");
  		$this->colectivoB = new Colectivo("153 Rojo", "Rosario Bus");
  }	

  public function testBoleto() {
    $this->tarjeta->recargar(272);
    $aux=$this->tarjeta->pagar($this->colectivoA, "2016/07/4 6:50");
    $this->assertEquals($aux->getTipo(),"Normal", "Tipo: Normal");
    $this->assertEquals($aux->getCosto(),8, "Costo del boleto: 8");
    $this->assertEquals($aux->getLinea(),"153 Negro", "Linea: 153");
    $this->assertEquals($aux->getFecha(),"2016/07/4 6:50", "Fecha: 2016/07/4 6:50");
    $this->assertEquals($aux->getId(),1, "La id de la tarjeta es 1");
    $this->assertEquals($aux->getSaldo(),312, "Tiene 312 de saldo");
    $this->assertEquals($this->tarjeta->saldo(), 312, "Cuando recargo 272 y pago un colectivo debo tener 312");
  }
 
}
?>
