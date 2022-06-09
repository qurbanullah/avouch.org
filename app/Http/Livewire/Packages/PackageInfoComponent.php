<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\BuiltPackage;

class PackageInfoComponent extends Component
{

    use WithPagination;

    public $packageSlug;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount($package_slug)
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->recordsPerPage = 10;
        $this->packageSlug = $package_slug;
    }

    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function readBuiltPackageDatabase()
    {
        return BuiltPackage::where('name', $this->packageSlug)->orderBy('updated_at', 'desc')->get();
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.packages.package-info-component', [
            'data' => $this->readBuiltPackageDatabase(),
        ]);
    }
}
