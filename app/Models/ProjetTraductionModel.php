<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjetTraductionModel extends Model
{
    protected $table            = 'projets_traductions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['projet_id', 'langue_id', 'titre', 'description'];
}