<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use App\Models\Post;
use App\Models\Group;
use App\Models\Package;

class PostEditComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $photo;
    public $photoPath;
    public $modelId;
    public $group;
    public $imageUploaded;


    public $slug;
    public $title;
    public $content;
    public $introduction;
    public $isActive = true;
    public $userId;
    public $groupId;
    public $packageId;
    public $postBannerImage;


    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount($post_slug)
    {
        $this->groupId = null;
        $this->packageId = null;

        $data = Post::where('slug', $post_slug)->first();

        // $this->slug = $post_slug;
        $this->modelId = $data->id;

        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->introduction = $data->introduction;
        $this->content = $data->content;
        $this->isActive = !$data->is_active ? null : true;
        $this->postBannerImage = $data->post_banner_image;
        $this->groupId = $data->group_id;
        $this->packageId = $data->pacage_id;
        // $this->loadModel();
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
            'content' => 'required',
            'introduction' => 'required',
        ];
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
    * The create function.
    *
    * @return void
    */
    public function update()
    {
        $this->validate();
        // Service banner image
        if($this->imageUploaded) {
            $this->postBannerImage = md5($this->imageUploaded . microtime()).'.'.$this->imageUploaded->extension();
            $this->imageUploaded->storeAs('public/posts-images', $this->postBannerImage);
        }
        else {
            $this->postBannerImage = $this->postBannerImage;
        }
        Post::find($this->modelId)->update($this->modelData());
        // MagazinePost::create($this->modelData());
        // $this->reset();
        session()->flash('message', 'Post created successfully.');
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
        $this->userId = auth()->user()->id;
        $this->groupId = $data->group_id;
        $this->packageId = $data->pacage_id;
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
        return view('livewire.posts.post-edit-component', [
            'groups' => $this->readGroups(),
            'packages' => $this->readPackages(),
        ]);
    }


}
