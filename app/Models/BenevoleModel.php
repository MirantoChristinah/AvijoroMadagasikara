<?php

namespace App\Models;

use CodeIgniter\Model;

class BenevoleModel extends Model
{
    protected $table            = 'benevoles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // ou 'object' selon tes préférences
    protected $useSoftDeletes   = false;

    // Champs autorisés pour les insertions et mises à jour
    protected $allowedFields = [
        'nom', 
        'email', 
        'telephone', 
        'motivation', 
        'disponibilite', 
        'statut'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // On n'a pas de champ updated_at dans le SQL fourni

    // Règles de validation de base
    protected $validationRules = [
        'nom'           => 'required|min_length[3]|max_length[100]',
        'email'          => 'required|valid_email|max_length[150]',
        'telephone'      => 'permit_empty|max_length[30]',
        'motivation'     => 'permit_empty',
        'disponibilite'  => 'permit_empty|max_length[100]',
        'statut'         => 'permit_empty|in_list[en attente,accepte,refuse]',
    ];

    protected $validationMessages = [
        'email' => [
            'valid_email' => 'Veuillez fournir une adresse email valide.'
        ],
        'statut' => [
            'in_list' => 'Le statut doit être : en attente, accepte, ou refuse.'
        ]
    ];
}