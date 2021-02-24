<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaPostModel extends Model
{
    protected $table      = 'categoria_post';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = [
        'id',
        'categoria_id',
        'post_id'
    ];
}
