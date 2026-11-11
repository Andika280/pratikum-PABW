<?php
namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin'; // Untuk Petani / Admin
    case User = 'user';   // Untuk Pembeli / User

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::User => 'User',
        };
    }
}