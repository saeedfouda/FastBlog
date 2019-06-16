<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Page;
use App\Comment;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::get();

        return view('home' , compact('posts'));
    }

    public function getpage($name){
      if($name != '') {
        $page = Page::where('title', $name)->first();
        if($page){
          return View('page' , compact('page'));
        }
      }
      return Redirect::back();
    }

    public function getpost($id){
      if($id != '') {
        $post = Post::find($id);
        if($post){

        $comment = Comment::where('post_id'  , $post->id)->get();

          return View('post' , compact('post' , 'comment'));
        }
      }
      return Redirect::back();
    }

    public function addComment(Request $request){


        $comment = strip_tags($request->comment);
        if($comment != ''){
            $c = new Comment();
            $c->user_id = Auth::user()->id;
            $c->comment = $comment;
            $c->post_id = $request->post_id;
            $c->save();

            return Redirect::back();
      }
    }

}
