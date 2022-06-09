<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

use App\Models\Post;

class PostSearchComponent extends Component
{
    public $query;
    public $post;
    public $postCount;
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
        $this->post = [];
        $this->highlightIndex = 0;
    }

    /**
     * increamentHighlight()
     * used for wire:keydown.arrow-up binding
     * @return void
    */
    public function increamentHighlight()
    {
        if ($this->highlightIndex === count($this->post) - 1){
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
            $this->highlightIndex === count($this->post) - 1;
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
        $package = $this->post[$this->highlightIndex] ?? null;
        if ($package){
            $this->redirect(route('posts.post-detail-component', $package['slug']));
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
        $this->post = Post::where('title', 'like', '%' . $this->query . '%')->limit(20)->get()->toArray();
    }

    // public function read()
    // {
    //     if (!empty ($this->query)) {
    //         return Post::select('magazine_posts.title', 'magazine_posts.slug', 'magazine_posts.created_at', 'users.name')
    //         ->join('users', 'magazine_posts.user_id', 'users.id')
    //         ->where('magazine_posts.title', 'like', '%' . $this->query . '%')
    //         ->orWhere('users.name', 'like', '%' . $this->query . '%')
    //         ->paginate(10);
    //     }
    // }

    public function render()
    {
        return view('livewire.posts.post-search-component');
    }
}