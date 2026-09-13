<?php

use PHPUnit\Framework\TestCase;
use App\Services\AuthService;
use App\Services\BillingService;
use App\Services\ReservationService;

class ResiIATest extends TestCase 
{
    /**
     * @test
     * CP-001: Verifica que el servicio de autenticación rechace correos con formato inválido.
     */
    public function test_registro_correo_invalido_lanza_excepcion(): void 
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Formato de correo inválido");

        $authService = new AuthService();
        $authService->registrarUsuario("usuario_invalid.com", "SecurePass123!");
    }

    /**
     * @test
     * CP-002: Valida que la fórmula de cálculo de mora aplique los porcentajes correctamente.
     */
    public function test_calculo_mora_correcto(): void 
    {
        $billingService = new BillingService();
        $totalCalculado = $billingService->calcularTotalPago(200000, 10, 0.005);

        $this->assertEquals(210000, $totalCalculado);
    }

    /**
     * @test
     * CP-003: Comprueba que el sistema rechace reservas que se solapen con horarios ocupados.
     */
    public function test_reserva_horario_duplicado_retorna_falso(): void 
    {
        $reservationService = new ReservationService();
        $esDisponible = $reservationService->validarDisponibilidad(1, "2026-10-01", "14:00", "16:00");

        $this->assertFalse($esDisponible);
    }
}