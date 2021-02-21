<?php

namespace App\Validation;

class Fechas {

    public function fechaMayorQue(string $str, string $fields, array $data) {

        if ($data['fin'] <= $data['inicio']) {
            return false;
        }
        return true;
    }

    public function fechaIgualHoy(string $str, string $fields, array $data) {

        if ($data['fecha'] > date('Y-m-d')) {
            return false;
        }
        return true;
    }

}
