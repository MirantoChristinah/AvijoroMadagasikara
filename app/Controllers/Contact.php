<?php
namespace App\Controllers;

class Contact extends BaseController
{
    public function index ()
    {
        $locale = $this->request->getLocale();
        if (!in_array($locale, ['fr', 'mg', 'en'])) {
            $locale = 'fr';
        }

        $data = [
            'lang' => $locale
        ];
         return $this->body("avijoro/contact",$data);
    }

    public function envoyer()
    {
        if ($this->request->getMethod() === 'POST') {
            
            $nomVisiteur       = $this->request->getPost('name');
            $emailVisiteur     = $this->request->getPost('email');
            $telephoneVisiteur = $this->request->getPost('phone');
            $sujetVisiteur     = $this->request->getPost('subject');
            $messageVisiteur   = $this->request->getPost('message');
            $email = \Config\Services::email();

            $config = [
                'protocol'     => 'smtp',
                'SMTPHost'     => 'smtp.gmail.com', 
                'SMTPUser'     => 'andriamahefahanitriniala@gmail.com',
                'SMTPPass'     => 'rmdjwrhpongafhxd', 
                'SMTPPort'     => 465,
                'SMTPCrypto'   => 'ssl',
                'mailType'     => 'text',
                'charset'      => 'utf-8',
                'wordWrap'     => true,
                'newline'      => "\r\n", 
                'CRLF'         => "\r\n"
            ];

            $email->initialize($config);
            $email->setFrom('andriamahefahanitriniala@gmail.com', $nomVisiteur);
            $email->setReplyTo($emailVisiteur, $nomVisiteur);
            $email->setTo('andriamahefahanitriniala@gmail.com');
            $email->setSubject("Nouveau message du site - Sujet : " . $sujetVisiteur);
            $corpsMessage = "Nom : " . $nomVisiteur . "\n";
            $corpsMessage .= "Téléphone : " . ($telephoneVisiteur ? $telephoneVisiteur : 'Non renseigné') . "\n\n";
            $corpsMessage .= "Message :\n" . $messageVisiteur;

            $email->setMessage($corpsMessage);

            $resultat = $email->send();

            $locale = $this->request->getLocale();

        // Si l'envoi échoue
        if (!$resultat) {
            return redirect()->to(base_url($locale . '/contact'))->with('error_mail', lang('Texte.contact_erreur_envoi'));
        }

        // Si l'envoi réussit
        return redirect()->to(base_url($locale . '/contact'))->with('success_mail', lang('Texte.contact_succes_envoi'));
    }


 
    }
   

}
?>