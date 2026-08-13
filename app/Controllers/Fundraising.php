<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class Fundraising extends BaseController
{
    protected $helpers = ['url'];

    private function renderPage(string $viewName, array $extra = []): string
    {
        $locale = $this->request->getLocale();

        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        $data = array_merge(['lang' => $locale], $extra);

        return view('includes/header', $data)
             . view($viewName, $data)
             . view('includes/footer', $data);
    }

    public function index()
    {
        return $this->renderPage('avijoro/fundraising');
    }

    public function produits()
    {
        $locale = $this->request->getLocale();
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        $produitModel = new ProduitModel();
        $produits = $produitModel->getProduitsTraduits($locale);

        return $this->renderPage('avijoro/produits', ['produits' => $produits]);
    }

    public function produit($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url($this->request->getLocale() . '/fundraising/produits'));
        }

        $locale = $this->request->getLocale();
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        $produitModel = new ProduitModel();
        $produit = $produitModel->getProduitTraduit((int) $id, $locale);

        if (!$produit) {
            return redirect()->to(base_url($locale . '/fundraising/produits'))->with('error', 'Produit introuvable.');
        }

        return $this->renderPage('avijoro/produit_detail', [
            'produit' => $produit,
        ]);
    }
}
