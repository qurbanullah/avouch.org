<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Package;
use App\Models\BuiltPackage;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class PackageHomeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $slug;
    public $content;
    public $isSetToActive = false;
    public $image;
    public $imageUploaded;
    public $recordsPerPage;
    public $query = '';
    public $highlightIndex;
    public $record;
    public $isActive = 1;
    public $distributionVersion;
    public $letter;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->resetVariables();
        $this->distributionVersion ="avh030";
        $this->recordsPerPage = 100;
    }

    public function resetVariables()
    {
        $this->query = '';
        $this->highlightIndex = 0;
    }







    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function readPackage()
    {
        return Package::latest()->limit(10)->get();
    }

    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function getPackagesAlphanumerically()
    {
        if($this->letter) {
            return Package::select('*')
                            ->where('name', 'like', $this->letter . '%')
                            ->paginate($this->recordsPerPage);
        }
        else
            return null;
    }

    /**
     * The readPackagefunction.
     *
     * @return void
    */
    public function updateLetter($letter)
    {
        $this->letter = $letter;
    }


    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.packages.package-home-component', [
            'data' => $this->readPackage(),
            'packagesAlphnumerical' => $this->getPackagesAlphanumerically(),
        ]);
    }
}
