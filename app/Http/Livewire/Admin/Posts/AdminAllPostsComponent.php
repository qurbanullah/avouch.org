<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use App\Models\Post;
use App\Models\Group;
use App\Models\Package;

class AdminAllPostsComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modelId;
    public $group;
    public $imageUploaded;
    public $isSetToActive = false;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $slug;
    public $title;
    public $content;
    public $introduction;
    public $isActive = true;
    public $authorId;
    public $groupId;
    public $packageId;
    public $postBannerImage;


    public function getAuthorId()
    {
        return auth()->user()->id;
    }

    public function updatedImageUploaded()
    {
        $this->validate([
            'imageUploaded' => 'image|max:1024', // 1MB Max
        ]);
    }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('magazine_posts', 'slug')->ignore($this->modelId)],
            'content' => 'required',
            'introduction' => 'required',
        ];
    }

    /**
    * The livewire mount function
    *
    * @return void
    */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readPosts()
    {
        // cache the data
        // $value = Cache::rememberForever('professionCatagories', function () {
        //     return ProfessionCategory::orderBy('slug')->get();
        // });
        // return $value;

        return Post::orderBy('slug')->paginate(24);
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readGroups()
    {
        // cache the data
        // $value = Cache::rememberForever('professionCatagories', function () {
        //     return ProfessionCategory::orderBy('slug')->get();
        // });
        // return $value;

        return Group::orderBy('slug')->get();
    }

    /**
    * The read function.
    *
    * @return void
    */
    public function readPackages()
    {
        // cache the data
        // $value = Cache::rememberForever('professionSubCatagories' . $this->professionCategoryId, function () {
        //     return ProfessionSubCategory::where('category_id', $this->professionCategoryId)
        //                             ->orderBy('slug')->get();
        // });
        // return $value;
        return Package::where('groups', $this->group)
                            ->orderBy('name')->get();
    }

    /**
    * Runs everytime the title
    * variable is updated.
    *
    * @param  mixed $value
    * @return void
    */
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    /**
     * Runs everytime the isActive
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsActive()
    {
        $this->isActive = true;
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
     * Edit Service
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    // public function goToEditService($id)
    // {
    //     return redirect()->route('services.service-edit', Crypt::encrypt($id));
    // }

    /**
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        $this->validate();
        $this->postBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
        // dd($this->photoPath);

        $this->imageUploaded->storeAs('public/posts-images', $this->postBannerImage);

        Post::create($this->modelData());
        $this->modalFormVisible = false;
        session()->flash('message', 'Post created successfully.');
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
            $this->postBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/services-images', $this->postBannerImage);
        }
        else {
            $this->postBannerImage = $this->postBannerImage;
        }
        Post::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

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
        Post::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Package Deleted Successfully!']);

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
        $data = Post::find($this->modelId);

        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->introduction = $data->introduction;
        $this->content = $data->content;
        $this->isSetToActive = !$data->is_active ? null : true;
        $this->postBannerImage = $data->post_banner_image;
        $this->user_id = auth()->user()->id;
        $this->groupId = $data->group_id;
        $this->pacageId = $data->pacage_id;
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

            'title' => $this->title,
            'slug' => $this->slug,
            'introduction' => $this->introduction,
            'content' => $this->content,
            'is_active' => $this->isActive,
            'post_banner_image' => $this->postBannerImage,
            'user_id' => auth()->user()->id,
            'group_id' => $this->groupId,
            'pacage_id' => $this->packageId,

        ];
    }

    /**
     * The livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.posts.admin-all-posts-component', [
            'groups' => $this->readGroups(),
            'packages' => $this->readPackages(),
            'data' => $this->readPosts(),
        ]);
    }
}
