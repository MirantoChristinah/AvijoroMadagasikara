<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualiteModel extends Model
{
    protected $table            = 'actualites';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = ['categorie', 'image', 'video', 'date_publication'];

    /**
     * Récupère toutes les actualités traduites et filtrées
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @param string|null $categorie La catégorie à filtrer (optionnel)
     * @return array La liste des articles prête pour la vue
     */
    public function getActualitesTraduites(string $codeLangue, ?string $categorie = null): array
    {
        $this->select('
            actualites.id, 
            actualites.image, 
            actualites.video, 
            actualites.date_publication, 
            actualites.categorie,
            actualites_traductions.titre, 
            actualites_traductions.contenu
        ');

        $this->join('actualites_traductions', 'actualites_traductions.actualite_id = actualites.id');
        $this->join('langues', 'langues.id = actualites_traductions.langue_id');

        $this->where('langues.code', $codeLangue);

        if ($categorie !== null && $categorie !== 'Tous') {
            $this->where('actualites.categorie', $categorie);
        }

        $this->orderBy('actualites.date_publication', 'DESC');

        return $this->findAll();
    }

        /**
     * Récupère une seule actualité par son ID pour la page de détail
     *
     * @param string $codeLangue Le code langue ('fr', 'mg', 'en')
     * @param int $id L'identifiant unique de l'article à récupérer
     * @return array|null L'article trouvé sous forme de tableau, ou null s'il n'existe pas
     */
    public function getActualiteSeule( int $id): ?array
    {
        $this->select('
            actualites.id, 
            actualites.image, 
            actualites.video, 
            actualites.date_publication, 
            actualites.categorie,
            actualites_traductions.titre, 
            actualites_traductions.contenu
        ');

        $this->join('actualites_traductions', 'actualites_traductions.actualite_id = actualites.id');
        $this->join('langues', 'langues.id = actualites_traductions.langue_id');
        $codeLangue=service('request')->getLocale();
        $this->where('langues.code', $codeLangue);
        $this->where('actualites.id', $id);
        return $this->first();
    }

}
