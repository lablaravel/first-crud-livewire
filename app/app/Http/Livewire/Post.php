<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;

class Post extends Component
{
    public $posts;

    // Validation Rules
    protected $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function render()
    {
        $this->posts = Posts::select('id','name','description')->get();
        return view('livewire.post');
    }
}
