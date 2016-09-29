<?php

namespace Tarjeta;

class MedioBoleto extends Sube {
  public function __construct() {
    $this->saldo = 0;
    $this->descuento = 0.5;
  }
}

