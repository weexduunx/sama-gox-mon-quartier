<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public $activeTab = 'certificates'; // Default active tab

    public $pendingCertificatesCount;
    public $openComplaintsCount;
    public $totalResidentsCount;
    public $monthlyEventsCount;

    public function mount()
    {
        // Simulate data from models
        // In a real app, you would fetch these from your database
        $this->pendingCertificatesCount = 12; // Example value
        $this->openComplaintsCount = 8; // Example value
        $this->totalResidentsCount = 1247; // Example value
        $this->monthlyEventsCount = 5; // Example value
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}