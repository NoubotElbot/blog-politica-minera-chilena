<?php

namespace App\Validation;

use App\Models\UsuarioModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data) {
        $model = new UsuarioModel();
        $user = $model->where('username', $data['username'])
                ->first();
        if (!$user) {
            return false;
        }
        return password_verify($data['password'], $user['password']);
    }
    
    public function userActivado(string $str, string $fields, array $data) {
        $model = new UsuarioModel();
        $user = $model->where('username', $data['username'])->where('activo',0)
                ->first();

        if (!$user) {
            return false;
        }
        return true;
    }

}
