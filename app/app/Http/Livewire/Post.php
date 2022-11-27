<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;

class Post extends Component
{
    public $posts, $name, $description, $post_id;
    public $updatePost = false;

    protected $listeners = [
      'deletePost' => 'destroy'
    ];

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

    public function resetFields(){
        $this->name = '';
        $this->description = '';
    }

    public function store(){
        //Validate Form Request
        $this->validate();
        try{
            Posts::create([
               'name' => $this->name,
               'description' => $this->description
            ]);

            // Set Flash Message
            session()->flash('success','Post Created Successfully!');

            // Reset Form Fields After Creating Post
            $this->resetFields();
        }catch(\Exception $e){
         /*
         * Interesting that bar(\) mean that is namespace global of PHP
         */
            session()->flash('error','Something goes wrong while creating post !');
            $this->resetFields();
        }
    }

    public function edit($id){
        $post = Posts::findOrFail($id);
        $this->name = $post->name;
        $this->description = $post->description;
        $this->post_id = $post->id;
        $this->updatePost = true;
    }

    public function cancel(){
        $this->updatePost = false;
        $this->resetFields();
    }

    public function update(){
        $this->validate();
        try{
            Posts::find($this->post_id)->fill([
                'name' => $this->name,
                'description' => $this->description
            ])->save();
            session()->flash('success', 'Post Updated Successfully!!');
            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error', 'Something goes wrong while updating post!!');
            $this->cancel();
        }
    }

    public function destroy($id){
        try{
            Posts::find($id)->delete();
            session()->flash('success','Post deleted Successfully!!');
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while deleting post!!');
        }
    }
}
