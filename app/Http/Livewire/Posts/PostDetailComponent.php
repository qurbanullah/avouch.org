<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
// import database model
use App\Models\Post;
use App\Models\PostComment;
use App\Models\UserProfession;
use App\Models\ProfessionSubCategory;

class PostDetailComponent extends Component
{
    public $postId;
    public $slug;
    public $comments;
    public $commentContent;
    public $professionCategoryId;
    public $professionSubCategoryId;

    // $posts should not be declared as a property in the Livewire component class,
    // you passed the posts with the laravel view() helpers as data.
    // Remove the line
    // public $posts;
    // And replace $this->posts by $posts in the render function:
    // https://stackoverflow.com/questions/64721432/livewire-throwing-error-when-using-paginated-data

    public function mount($post_slug)
    {
        $this->slug = $post_slug;
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function readPost()
    {
        $post = Post::where('slug', $this->slug)->first();
        if (empty($post)) {
            abort(404, 'Requested post does not exists.');
        } else {
            $this->postId = $post->id;
            return $post;
        }
    }


    /**
    * get professionals related to current post.
    *
    * @return void
    */
    // public function getRelatedProfessional()
    // {
    //     $professionals = UserProfession::where('profession_sub_categories_id', $this->professionSubCategoryId)->inRandomOrder()->limit(20)->get();
    //     // dd($professionals);
    //     return $professionals;
    // }

    /**
    * get professions related to current post.
    *
    * @return void
    */
    // public function getRelatedProfessions()
    // {
    //     $professions = ProfessionSubCategory::where('category_id', $this->professionCategoryId)->inRandomOrder()->limit(20)->get();
    //     // dd($professionals);
    //     return $professions;
    // }

    /**
    * The validation rules
    *
    * @return void
    */
    public function rules()
    {
        return [
            'commentContent' => 'required',
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
        PostComment::create($this->modelData());
        $this->reset('commentContent');
        session()->flash('message', 'Comment added successfully.');

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
            'post_id' => $this->postId,
            'user_id' => auth()->user()->id,
            'content' => $this->commentContent,
        ];
    }

    /**
     * The render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.posts.post-detail-component', [
            'post' => $this->readPost(),
        ]);
    }
}
