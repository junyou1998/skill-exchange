<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class FrontController extends Controller
{
    public function index(){
        $posts =  Post::all();
        $categories = Category::all();
        // dd($posts);
        return view('frontend.index',compact('posts','categories'));
    }
    public function indexWithCategory(Category $category){
        $posts = Post::where('category_id',$category->id)->get();
        $categories = Category::all();
        return view('frontend.index',compact('posts','categories'));
    }
}
