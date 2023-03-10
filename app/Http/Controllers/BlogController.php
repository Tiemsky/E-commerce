<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $post = DB::table('posts')
        ->join('post_category','posts.category_id','post_category.id')
        ->select('posts.*','post_category.category_name_en','post_category.category_name_fr')
        ->get();
        // return response()->json($post);
        return view('pages.blog',compact('post'));
    }

    public function English(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();

    }

    public function French(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','french');
        return redirect()->back();
        
    }

    public function BlogSingle($id){
        $posts = DB::table('posts')->where('id',$id)->get();
        return view('pages.blog_single',compact('posts'));

    }
}
