<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = ['prix', 'categorie', 'image', 'tailles', 'couleurs', 'disponible', 'created_at'];

    /**
     * Récupère tous les produits traduits et disponibles
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @return array La liste des produits
     */
    public function getProduitsTraduits(string $codeLangue): array
    {
        return $this->select('
            produits.id,
            produits.prix,
            produits.categorie,
            produits.image,
            produits.tailles,
            produits.couleurs,
            produits.disponible,
            produits_traductions.nom,
            produits_traductions.description
        ')
            ->join('produits_traductions', 'produits_traductions.produit_id = produits.id')
            ->join('langues', 'langues.id = produits_traductions.langue_id')
            ->where('langues.code', $codeLangue)
            ->where('produits.disponible', 1)
            ->orderBy('produits.id', 'ASC')
            ->findAll();
    }

    /**
     * Récupère un seul produit traduit
     *
     * @param int $id L'identifiant du produit
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @return array|null Le produit traduit ou null
     */
    public function getProduitTraduit(int $id, string $codeLangue): ?array
    {
        return $this->select('
            produits.id,
            produits.prix,
            produits.categorie,
            produits.image,
            produits.tailles,
            produits.couleurs,
            produits.disponible,
            produits_traductions.nom,
            produits_traductions.description
        ')
            ->join('produits_traductions', 'produits_traductions.produit_id = produits.id')
            ->join('langues', 'langues.id = produits_traductions.langue_id')
            ->where('langues.code', $codeLangue)
            ->where('produits.id', $id)
            ->where('produits.disponible', 1)
            ->first();
    }
}
