<?php

namespace App\Http\Livewire\Admin\Packages;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Package;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminAllPackagesComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $name;
    public $slug;
    public $baseName;
    public $shortDescription;
    public $longDescription;
    public $bannerImage;
    public $images;
    public $thumbnail;
    public $groupId;
    public $groups;
    public $isSetToActive = false;

    public $imageUploaded;
    public $recordsToDisplay = 400;
    public $query = '';
    public $highlightIndex;
    public $isActive = 1;

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
    }

    public function resetVariables()
    {
        $this->query = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        // if ($contact) {
        //     $this->redirect(route('admin.categories.main-category-detail', $contact['id']));
        // }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        if(!empty($this->query)) {
            return Package::select('*')
                        ->where('is_active', $this->isActive)
                        ->where('name', 'like', '%' . $this->query . '%')
                        ->with('group')
                        ->paginate($this->recordsToDisplay);
        }
    }

    /**
    * The readbusinessCategory function.
    *
    * @return void
    */
    public function readGroupDatabase()
    {
        $this->groups = Group::get();
    }

    /**
     * The readmainCategory function.
     *
     * @return void
     */
    public function readPackageDatabase()
    {
        return Package::where('is_active', $this->isActive)
                                ->with('group')
                                ->paginate($this->recordsToDisplay);
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => ['required', Rule::unique('mysql_avouch_packages.packages', 'slug')->ignore($this->modelId)],
            'shortDescription' => 'required',
            'groupId' => 'required',
        ];
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    /**
    * Runs everytime the pageBannerPhotoPath
    * variable is updated.
    *
    * @return void
    */
    public function updatedPhoto()
    {
        $this->validate([
            'imageUploaded' => 'image|max:1024', // 1MB Max
        ]);
    }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->readGroupDatabase();
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }


    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();

        if($this->imageUploaded) {
            $this->bannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/groups-images', $this->bannerImage);

            Package::create($this->modelData());
            $this->modalFormVisible = false;

        }
        else {
            Package::create($this->modelData());
            $this->modalFormVisible = false;
        }

        $this->reset();

        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'New Category',
        //     'eventMessage' => 'Another category has been created!',
        // ]);
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        if($this->imageUploaded) {
            $this->bannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/groups-images', $this->bannerImage);

            Package::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;

        }
        else {
            Package::find($this->modelId)->update($this->modelData());
            $this->modalFormVisible = false;
        }

        // $this->reset();
        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Updated Page',
        //     'eventMessage' => 'There is a page (' . $this->modelId . ') that has been updated!',
        // ]);
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Package::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

        // $this->dispatchBrowserEvent('event-notification', [
        //     'eventName' => 'Deleted User',
        //     'eventMessage' => 'The user (' . $this->modelId . ') has been deleted!',
        // ]);
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Package::find($this->modelId);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->baseName = $data->base_name;
        $this->shortDescription = $data->short_description;
        $this->longDescription = $data->long_description;
        $this->bannerImage = $data->banner_image;
        $this->images = $data->images;
        $this->thumbnail = $data->thumbnail;
        $this->isSetToActive = !$data->is_active ? null : true;
        $this->groupId = $data->group_id;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'base_name' => $this->baseName,
            'short_description' => $this->shortDescription,
            'long_description' => $this->longDescription,
            'banner_image' => $this->bannerImage,
            'images' => $this->images,
            'thumbnail' => $this->thumbnail,
            'is_active' => $this->isSetToActive,
            'group_id' => $this->groupId,
        ];
    }


    /**
     * Dispatch event
     *
     * @return void
     */
    // public function dispatchEvent()
    // {
    //     $this->dispatchBrowserEvent('event-notification', [
    //         'eventName' => 'Sample Event',
    //         'eventMessage' => 'You have a sample event notification!',
    //     ]);
    // }


    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.packages.admin-all-packages-component', [
            'data' => $this->readPackageDatabase(),
            'searchedData' => $this->readDatabaeForSearchQuery(),

        ]);
    }
}
