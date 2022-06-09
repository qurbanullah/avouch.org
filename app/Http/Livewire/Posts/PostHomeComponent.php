<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class PostHomeComponent extends Component
{
    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Post::where('is_active', true)->latest()->paginate(30);
    }

    public function render()
    {
        return view('livewire.posts.post-home-component', [
            'data' => $this->read(),
        ]);
    }
}