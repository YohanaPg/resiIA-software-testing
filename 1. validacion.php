<?php

namespace App\Services;

use InvalidArgumentException;

class AuthService 
{
    public function registrarUsuario(string $email, string $password): bool 
    {
        // Validación de sintaxis de correo
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Formato de correo inválido");
        }

        // Lógica de simulación de registro exitoso
        return true;
    }
}