<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType    = 'array';

    protected $allowedFields = ['id', 'categoria_nombre', 'activo', 'create_at', 'update_at', 'slug'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
}
