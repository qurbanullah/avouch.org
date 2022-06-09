<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


use App\Models\Post;
use App\Models\Group;
use App\Models\Package;

class AdminCreateNewPostComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $photo;
    public $photoPath;
    public $modelId;
    public $group;
    public $imageUploaded;

    public $value;
    public $trixId;


    public $slug;
    public $title;
    public $content;
    public $introduction;
    public $isActive = true;
    public $authorId;
    public $groupId;
    public $packageId;
    public $postBannerImage;

    /**
    * The livewire mount function
    *
    * @return void
    */
    public function mount($value = '')
    {
        // Resets the pagination after reloading the page
        $this->value = $value;
        $this->trixId = uniqid();

        // $this->resetPage();
    }

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
            'slug' => ['required', Rule::unique('mysql_avouch_posts.posts', 'slug')->ignore($this->modelId)],
            'introduction' => 'required',
        ];
    }



    /**
    * The read function.
    *
    * @return void
    */
    public function getGroups()
    {
        // cache the data
        // $value = Cache::rememberForever('professionCatagories', function () {
        //     return ProfessionCategory::orderBy('slug')->get();
        // });
        // return $value;

        return Group::orderBy('slug')->get();
    }

    /**
    * The get function.
    *
    * @return void
    */
    public function getPackages()
    {

        // cache the data
        // $value = Cache::rememberForever('professionSubCatagories' . $this->professionCategoryId, function () {
        //     return ProfessionSubCategory::where('category_id', $this->professionCategoryId)
        //                             ->orderBy('slug')->get();
        // });
        // return $value;

        return Package::where('group_id', $this->groupId)
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
    * The create function.
    *
    * @return void
    */
    public function create()
    {
        // $this->validate();
        // // Service banner image
        // if($this->imageUploaded) {
        //     $this->postBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
        //     $this->imageUploaded->storeAs('public/posts-images', $this->postBannerImage);
        // }
        // else {
        //     $this->postBannerImage = $this->postBannerImage;
        // }
        // Post::create($this->modelData());
        // $this->reset();
        session()->flash('message', 'Post created successfully.');

        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Post Created Successfully!']);
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
        $this->isActive = !$data->is_active ? null : true;
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
        // dd(request('attachment-post-trixFields'));
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
            'post-trixFields' => request('post-trixFields'),
            'attachment-post-trixFields' => request('attachment-post-trixFields'),


        ];
    }

    /**
     * The livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.posts.admin-create-new-post-component', [
            'groups' => $this->getGroups(),
            'packages' => $this->getPackages(),
        ]);
    }
}
