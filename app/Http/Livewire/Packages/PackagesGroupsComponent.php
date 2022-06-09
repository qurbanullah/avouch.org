<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Group;

class PackagesGroupsComponent extends Component
{
    use WithPagination;

    public $packageSlug;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->recordsPerPage = 100;
    }

        /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function getGroup()
    {
        return Group::where('slug', $this->groupSlug)->get();
    }

    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function readGroups()
    {
        return Group::paginate($this->recordsPerPage);
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.packages.packages-groups-component', [
            'data' => $this->readGroups(),
        ]);
    }
}
