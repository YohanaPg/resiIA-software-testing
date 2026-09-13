<?php

namespace App\Services;

class ReservationService 
{
    public function validarDisponibilidad(int $zonaId, string $fecha, string $horaInicio, string $horaFin): bool 
    {
        // Simulación: La zona 1 el día 2026-10-01 de 13:00 a 15:00 está ocupada
        $reservaExistente = [
            'zona_id' => 1,
            'fecha' => '2026-10-01',
            'hora_inicio' => '13:00',
            'hora_fin' => '15:00'
        ];

        if ($zonaId === $reservaExistente['zona_id'] && $fecha === $reservaExistente['fecha']) {
            // Verificar si hay solapamiento de horarios
            if ($horaInicio < $reservaExistente['hora_fin'] && $horaFin > $reservaExistente['hora_inicio']) {
                return false; // Existe conflicto de horario
            }
        }

        return true;
    }
}