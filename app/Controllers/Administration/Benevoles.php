<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class Benevoles extends BaseController
{
    public function index()
    {
        $model = new \App\Models\BenevoleModel();

        $statut = $this->request->getGet('statut');
        if (!empty($statut) && in_array($statut, ['en attente', 'accepte', 'refuse'])) {
            $model->where('statut', $statut);
        }

        $data['benevoles'] = $model->orderBy('created_at', 'DESC')->findAll();
        $data['statutActif'] = $statut ?: '';

        return view('Administration/benevoles/index', $data);
    }

    public function statut($id = null, $statut = null)
    {
        if ($id === null || !in_array($statut, ['en attente', 'accepte', 'refuse'])) {
            return redirect()->to('/admin/benevoles');
        }

        $model = new \App\Models\BenevoleModel();
        $candidat = $model->find($id);

        if (!$candidat) {
            return redirect()->to('/admin/benevoles')->with('error', 'Candidature introuvable.');
        }

        $model->update($id, ['statut' => $statut]);

        return redirect()->to('/admin/benevoles')->with('success', 'Statut de la candidature mis à jour.');
    }

    public function supprimer($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/benevoles');
        }

        $model = new \App\Models\BenevoleModel();
        $candidat = $model->find($id);

        if (!$candidat) {
            return redirect()->to('/admin/benevoles')->with('error', 'Candidature introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/admin/benevoles')->with('success', 'La candidature a bien été supprimée.');
    }
}
