<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = [
        'id',
        'slug',
        'titulo',
        'subtitulo',
        'cuerpo',
        'imagen',
        'activo',
        'create_at',
        'update_at',
        'usuario_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
