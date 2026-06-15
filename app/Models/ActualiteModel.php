<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualiteModel extends Model
{
    protected $table            = 'actualites';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // On liste les champs modifiables de la table principale
    protected $allowedFields    = ['categorie', 'image', 'video', 'date_publication', 'featured'];

    /**
     * Récupère toutes les actualités traduites et filtrées
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @param string|null $categorie La catégorie à filtrer (optionnel)
     * @return array La liste des articles prête pour la vue
     */
    public function getActualitesTraduites(string $codeLangue, ?string $categorie = null): array
    {
        // 1. On sélectionne les colonnes dont la vue a besoin
        $this->select('
            actualites.id, 
            actualites.image, 
            actualites.video, 
            actualites.date_publication, 
            actualites.categorie,
            actualites.featured,
            actualites_traductions.titre, 
            actualites_traductions.contenu
        ');

        // 2. On fusionne les tables (Jointures SQL)
        $this->join('actualites_traductions', 'actualites_traductions.actualite_id = actualites.id');
        $this->join('langues', 'langues.id = actualites_traductions.langue_id');

        // 3. On applique le filtre de langue obligatoire (ex: 'mg')
        $this->where('langues.code', $codeLangue);

        // 4. !On applique le filtre par catégorie si l'utilisateur en a choisi une (ex: 'Événements')
        if ($categorie !== null && $categorie !== 'Tous') {
            $this->where('actualites.categorie', $categorie);
        }

        // 5. On trie par date de publication (du plus récent au plus ancien)
        $this->orderBy('actualites.date_publication', 'DESC');

        // 6. On exécute et on renvoie le résultat
        return $this->findAll();
    }
}
