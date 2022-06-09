<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Package;
use App\Models\Group;

class PackagesGroupDetailComponent extends Component
{
    use WithPagination;

    public $groupSlug;

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount($group_slug)
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->recordsPerPage = 100;
        $this->groupSlug = $group_slug;
    }

    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function getGroupDetail()
    {
        // dd($this->groupSlug);
        return Group::where('slug', $this->groupSlug)->first();
    }

    /**
     * The readPackagefunction.
     *
     * @return void
     */
    public function getPackages()
    {
        return Package::where('groups', $this->groupSlug)->get();
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.packages.packages-group-detail-component', [
            'data' => $this->getPackages(),
            'group' => $this->getGroupDetail(),
        ]);
    }
}
