<?php

namespace Tarjeta;

use PHPUnit\Framework\TestCase;

  protected $tarjeta,$medio,$colectivo144,$colectivo35verde,$bici10;	

  public function setup(){
			$this->tarjeta = new Tarjeta();
      $this->medio = new Medio();
			$this->colectivoA = new Colectivo("144 Rojo", "Rosario Bus");
  		$this->colectivoB = new Colectivo("35 Verde", "Rosario Bus");
      $this->bici10 = new Bicicleta("10");
  }	

  public function testCargandoTarjeta() {
    $this->tarjeta->recargar(272);
    $this->assertEquals($this->tarjeta->saldo(), 320, "Cuando cargo 272 tendría que tener 320 pesos");
    $this->tarjeta = new Tarjeta();
    $this->tarjeta->recargar(510);
    $this->assertEquals($this->tarjeta->saldo(), 650, "Cuando cargo 510 tendría que tener 645 pesos");
  }
