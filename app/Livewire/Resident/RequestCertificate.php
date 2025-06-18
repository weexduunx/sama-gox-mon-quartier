<?php

namespace App\Livewire\Resident;

use Livewire\Component;

class RequestCertificate extends Component
{
    public $name;
    public $address;
    public $phone;
    public $purpose;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'purpose' => 'required|string|in:Emploi,Banque,École,Autre',
    ];

    public function submitCertificateRequest()
    {
        $this->validate();

        // Ici, vous enregistreriez la demande dans la base de données.
        // Pour l'instant, nous allons simuler un succès.
        // Exemple: CertificateRequest::create([...]);

        session()->flash('message', 'Votre demande de certificat a été envoyée avec succès ! Elle sera traitée sous 24h.');

        // Réinitialiser les champs du formulaire après soumission
        $this->reset(['name', 'address', 'phone', 'purpose']);

        // Rediriger ou rester sur la page avec un message
        return redirect()->route('resident.home'); // Redirection vers la page d'accueil après succès
    }

    public function render()
    {
        return view('livewire.resident.request-certificate');
    }
}