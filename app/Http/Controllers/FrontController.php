<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
class FrontController extends Controller
{
    public function index(){
        $posts =  Post::all();
        $categories = Category::all();
        // $tags = Tag::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
        // dd($posts);
        return view('frontend.index',compact('posts','categories','tags'));
    }
    public function indexWithCategory(Category $category){
        $posts = Post::where('category_id',$category->id)->get();
        $categories = Category::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
        return view('frontend.index',compact('posts','categories','tags'));
    }
    public function indexWithTag(Tag $tag){
        $posts = $tag->posts;
        $categories = Category::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
        // posts_count
        return view('frontend.index',compact('posts','categories','tags'));
    }
}
