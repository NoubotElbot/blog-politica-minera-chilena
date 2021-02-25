<?php

namespace App\Models;

use CodeIgniter\Model;

class SesionModel extends Model
{
    protected $table      = 'sesion';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id','username','ip_address','usuario_id','create_at',];
 
}