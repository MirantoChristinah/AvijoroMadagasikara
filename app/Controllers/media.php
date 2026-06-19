<?php
namespace App\Controllers;

class Media extends BaseController
{
    public function index ()
    {
        $mediaModel = new MediaModel();
        $typeSelectionne = $this->request->getGet('type') ?? 'Tous';
        $data = [
            'type_selectionne'  => $typeSelectionne,
            'liste_medias'      => $mediaModel->getMediasFormates($locale, $typeSelectionne)
        ];
        body("avijoro/media",$data);
    }
       
   
}



?>