<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * Base URL de ton projet
     */
    public string $baseURL = 'http://localhost:8081/';

    /**
     * IMPORTANT :
     * Laisser vide en développement CI4 (sinon casse les routes propres)
     */
    public string $indexPage = '';

    /**
     * Protocoles URI
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * Caractères autorisés dans les URLs
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-';

    /**
     * Locale par défaut
     */
    public string $defaultLocale = 'fr';

    /**
     * IMPORTANT :
     * Désactivé car tu gères déjà la langue via /fr et /mg
     */
    public bool $negotiateLocale = false;

    /**
     * Langues supportées
     */
    public array $supportedLocales = ['fr', 'mg'];

    /**
     * Fuseau horaire
     */
    public string $appTimezone = 'Indian/Antananarivo';

    /**
     * Encodage
     */
    public string $charset = 'UTF-8';

    /**
     * HTTPS global (laisser false en local)
     */
    public bool $forceGlobalSecureRequests = false;

    /**
     * AJOUT CORRECTION CRASH SYSTEM : Noms d'hôtes autorisés
     */
    public array $allowedHostnames = [];

    /**
     * Proxy (vide en local)
     */
    public array $proxyIPs = [];

    /**
     * Content Security Policy
     */
    public bool $CSPEnabled = false;
}
