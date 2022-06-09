<?php

namespace App\Http\Livewire\Packages;

use App\Models\Package;
use Livewire\Component;

class PackagesSearchComponent extends Component
{
    public $query;
    public $packages;
    public $packagesCount;
    public $highlightIndex;
    public $recordsPerPage = 10;

    /**
     * resetVariables()
     * Livewire mount function
     * @return void
    */
    public function mount()
    {
        $this->resetVariables();
    }

    /**
     * resetVariables()
     * used for resetting the variables
     * @return void
    */
    public function resetVariables()
    {
        $this->query = '';
        $this->packages = [];
        $this->highlightIndex = 0;
    }

    /**
     * increamentHighlight()
     * used for wire:keydown.arrow-up binding
     * @return void
    */
    public function increamentHighlight()
    {
        if ($this->highlightIndex === count($this->packages) - 1){
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    /**
     * decreamentHighlight()
     * used for wire:keydown.arrow-down binding
     * @return void
    */
    public function decreamentHighlight()
    {
        if ($this->highlightIndex === 0){
            $this->highlightIndex === count($this->packages) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    /**
     * selectPackage()
     * used for wire:keydown.enter binding
     * @return void
    */
    public function selectPackage()
    {
        $package = $this->packages[$this->highlightIndex] ?? null;
        if ($package){
            $this->redirect(route('packages.package-info-component', $package['name']));
        }
    }

    /**
     * updatedQuery()
     * used to get data from databse for query
     * @return void
    */
    public function updatedQuery()
    {
        // limit to 20 records
        // convert to array for better preocessing in blade file
        $this->packages = Package::where('name', 'like', '%' . $this->query . '%')->limit(20)->get()->toArray();
    }

    /**
     * render()
     * Livewire render function
     * @return void
    */
    public function render()
    {
        return view('livewire.packages.packages-search-component');
    }
}
