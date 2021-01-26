<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
	public function index(){		
		$posts = Post::latest()->get();		
		return view('posts.index',compact('posts'));
	}

    public function create(){
    	return view('posts.createpost');
    }

    public function store(Request $request){    	
    	//Validation:
    	$validatepost = $request->validate([
    			'title' => 'required',
	    	],[
	    		'title.required' => 'Title is required',
	    	]
      	);

    	$post = new Post();
    	$post->title = $request->get('title');
    	$post->body = $request->get('body');
    	$post->save();
    	return redirect('allposts')->with('success','Post added successfully');
    }

    public function show($id){
    	$post = Post::find($id);    
    	//dd($post);exit;
    	return view('posts.postshow',compact('post'));
    }
}
