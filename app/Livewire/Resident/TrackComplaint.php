<?php

namespace App\Livewire\Resident;

use Livewire\Component;

class TrackComplaint extends Component
{
    public $name;
    public $type;
    public $description;
    public $address;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|in:Nuisance sonore,Voirie,Éclairage,Déchets,Sécurité,Autre',
        'description' => 'required|string|min:10',
        'address' => 'required|string|max:255',
    ];

    public function submitComplaint()
    {
        $this->validate();

        // Ici, vous enregistreriez la plainte dans la base de données.
        // Exemple: Complaint::create([...]);

        session()->flash('message', 'Votre plainte a été enregistrée avec succès. Merci pour votre signalement.');

        // Réinitialiser les champs du formulaire après soumission
        $this->reset(['name', 'type', 'description', 'address']);

        return redirect()->route('resident.home'); // Redirection vers la page d'accueil après succès
    }

    public function render()
    {
        return view('livewire.resident.track-complaint');
    }
}