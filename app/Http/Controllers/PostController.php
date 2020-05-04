<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index(){

        $user = User::findOrFail(Auth::id());
        $posts = $user->posts;
        
        
        return view('frontend.posts.index',compact('posts'));
    }

    public function indexByAdmin(){

        $posts =  Post::all();
        $categories = Category::all();
        // dd($posts);
        // return view('frontend.index',compact('posts','categories'));

        // $user = User::findOrFail(Auth::id());
        // $posts = $user->posts;

        return view('admin.posts.index',compact('posts','categories'));
    }

    public function create(){
        $post = new Post;
        $categories = Category::all();
        return view('frontend.posts.create',compact('categories'));
    }

    public function store(Request $request){
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = Auth::id();

        $post->save();

        $tags = explode(',',$request->tags);
        foreach ($tags as $key => $tag) {
            // create /load tags
            $model = Tag::firstOrCreate(['name'=>$tag]);
            // connect post & tags
            $post->tags()->attach($model->id);
        }
        return redirect('/posts');
    }

    public function show(Post $post){
        return view('frontend.posts.show',compact('post'));
    }

    public function destroy(Post $post){
        $post->delete();   
    }

    public function destroyByAdmin(Post $post){
        $post->delete();   
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('frontend.posts.edit',compact('post','categories'));
    }
    public function update(Request $request,Post $post){
        
        $post->update($request->all());

        $post->save();


        $post->tags()->detach();
        // foreach ($post->tags as $key => $tag) {
        //     $post->tags()->detach($model->id);
        // }
        
        $tags = explode(',',$request->tags);
        foreach ($tags as $key => $tag) {
            // create /load tags
            $model = Tag::firstOrCreate(['name'=>$tag]);
            // connect post & tags
            $post->tags()->attach($model->id);
        }
        return redirect('/posts');
    }

    public function preview(Post $post){
        
        return response()->json($post);
    }
    
}
