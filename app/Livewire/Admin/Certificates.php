<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Certificate; // Importer le modèle Certificate

class Certificates extends Component
{
    public $certificates = []; // Sera une collection de modèles Certificate
    public $showModal = false;
    public $editingCertificateId = null; // Stockera l'ID du certificat en édition, pas l'objet complet
    public $modalTitle = '';

    // Form properties for new/editing certificate
    public $applicant;
    public $address;
    public $phone;
    public $purpose;
    public $status = 'En attente'; // Valeur par défaut pour un nouveau certificat

    protected $rules = [
        'applicant' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'purpose' => 'required|string|in:Emploi,Banque,École,Autre',
        'status' => 'required|string|in:En attente,Approuvé,Rejeté',
    ];

    public function mount()
    {
        $this->loadCertificates();
    }

    private function loadCertificates()
    {
        $this->certificates = Certificate::orderBy('created_at', 'desc')->get();
    }

    public function showNewCertificateForm()
    {
        $this->resetValidation();
        $this->reset(['applicant', 'address', 'phone', 'purpose', 'status', 'editingCertificateId']);
        $this->modalTitle = 'Nouvelle Demande de Certificat';
        $this->showModal = true;
    }

    public function editCertificate($id)
    {
        $this->resetValidation();
        $certificate = Certificate::find($id);
        if ($certificate) {
            $this->editingCertificateId = $certificate->id;
            $this->applicant = $certificate->applicant;
            $this->address = $certificate->address;
            $this->phone = $certificate->phone;
            $this->purpose = $certificate->purpose;
            $this->status = $certificate->status;
            $this->modalTitle = 'Modifier le Certificat';
            $this->showModal = true;
        }
    }

    public function saveCertificate()
    {
        $this->validate();

        if ($this->editingCertificateId) {
            // Mise à jour d'un certificat existant
            $certificate = Certificate::find($this->editingCertificateId);
            if ($certificate) {
                $certificate->update([
                    'applicant' => $this->applicant,
                    'address' => $this->address,
                    'phone' => $this->phone,
                    'purpose' => $this->purpose,
                    'status' => $this->status,
                ]);
                session()->flash('message', 'Certificat mis à jour avec succès.');
            }
        } else {
            // Ajout d'un nouveau certificat
            Certificate::create([
                'applicant' => $this->applicant,
                'address' => $this->address,
                'phone' => $this->phone,
                'purpose' => $this->purpose,
                'status' => $this->status, // sera 'En attente' par défaut
                'request_date' => now()->toDateString(),
            ]);
            session()->flash('message', 'Nouvelle demande de certificat ajoutée avec succès.');
        }

        $this->showModal = false;
        $this->reset(['applicant', 'address', 'phone', 'purpose', 'status', 'editingCertificateId']);
        $this->loadCertificates(); // Recharger les données depuis la DB
    }

    public function approveCertificate($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->update(['status' => 'Approuvé']);
            session()->flash('message', 'Certificat approuvé.');
            $this->loadCertificates(); // Recharger les données
        }
    }

    public function rejectCertificate($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->update(['status' => 'Rejeté']);
            session()->flash('message', 'Certificat rejeté.');
            $this->loadCertificates(); // Recharger les données
        }
    }

    public function deleteCertificate($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->delete();
            session()->flash('message', 'Certificat supprimé.');
            $this->loadCertificates(); // Recharger les données
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['applicant', 'address', 'phone', 'purpose', 'status', 'editingCertificateId']);
    }

    public function render()
    {
        return view('livewire.admin.certificates');
    }
}