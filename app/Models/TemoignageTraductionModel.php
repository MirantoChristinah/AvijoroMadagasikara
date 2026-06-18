<?php

namespace App\Models;

use CodeIgniter\Model;

class TemoignageTraductionModel extends Model
{
    protected $table            = 'temoignages_traductions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['temoignage_id', 'langue_id', 'role_personne', 'message'];
}