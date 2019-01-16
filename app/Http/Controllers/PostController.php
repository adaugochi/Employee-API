<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Validator;

class PostController extends Controller
{
    public function index($id) 
   {
        $model = Post::find($id);
        return $model;
   }
    public function create(Request $request) 
   {
        $validator = Validator::make($request->all(), [
            
            'title' => 'required',
            'body'  => 'required',
            'user_id' => 'required'
        
        ]);

        if ($validator->fails()) {
            $response = array('response' => $validator->messages(), 'success' => false);
            return $response;
        } else {
            $post = new Post;

            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->user_id =$request->input('user_id');
            $post->images = $request->input('images');


            $post->save();

            return response()->json($post);
        }
   }  
}
