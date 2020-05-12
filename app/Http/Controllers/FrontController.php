<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\Like;

use Illuminate\Support\Facades\Auth;
class FrontController extends Controller
{
    public function index(){
        $posts =  Post::withCount(['likes'])->with(['likes'=>function ($query) {
            $query->where('user_id',Auth::id());
        }])->orderBy('created_at','desc')->get();

        $categories = Category::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();

        
        return view('frontend.index',compact('posts','categories','tags'));
    }
    public function indexWithCategory(Category $category){
        $posts = Post::where('category_id',$category->id)->orderBy('created_at','desc')->get();
        $categories = Category::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
        return view('frontend.index',compact('posts','categories','tags','category'));
    }
    public function indexWithTag(Tag $tag){
        $posts = $tag->posts;
        $categories = Category::all();
        $tags = Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
        // posts_count
        return view('frontend.index',compact('posts','categories','tags'));
    }
}
