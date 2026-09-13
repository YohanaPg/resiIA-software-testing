<?php

namespace App\Services;

class BillingService 
{
    public function calcularTotalPago(float $montoBase, int $diasMora, float $tasaDiaria): float 
    {
        $recargo = $montoBase * $diasMora * $tasaDiaria;
        return $montoBase + $recargo;
    }
}