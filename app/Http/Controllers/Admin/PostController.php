<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class PostController extends Controller
{

    public function BlogCatList(){
        $blogcat = DB::table('post_category')->get();
        return view('admin.blog.category.index',compact('blogcat'));
        }

    public function BlogCatStore(Request $request){
        $validateDate = $request->validate([
        'category_name_en' => 'required|max:255',
        'category_name_fr' => 'required|max:255',
        ]);

        $data = array();
    $data['category_name_en'] = $request->category_name_en;
    $data['category_name_fr'] = $request->category_name_fr;
    DB::table('post_category')->insert($data);
    $notification=array(
                'messege'=>'Catégorie de blog ajoutée avec succès',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification); 
    }

    public function DeleteBlogCat($id){
        DB::table('post_category')->where('id',$id)->delete();
        $notification=array(
                'messege'=>'Catégorie de blog supprimée avec succès',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);

    }

    public function EditBlogCat($id){
        $blogcatedit = DB::table('post_category')->where('id',$id)->first();
        return view('admin.blog.category.edit',compact('blogcatedit'));

    }

    public function UpdateBlogCat(Request $request,$id){
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_fr'] = $request->category_name_fr;
        DB::table('post_category')->where('id',$id)->update($data);
        $notification=array(
                    'messege'=>'Catégorie de blog mise à jour avec succès',
                    'alert-type'=>'success'
                    );
                    return Redirect()->route('add.blog.categorylist')->with($notification); 
        
        }

    public function Create(){

        $blogcategory = DB::table('post_category')->get();
        return view('admin.blog.create',compact('blogcategory'));
        
    }

    public function store(Request $request){

        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_fr'] = $request->post_title_fr;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_fr'] = $request->details_fr;

        $post_image = $request->file('post_image');

        if ($post_image) {
            $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400,200)->save('public/media/post/'.$post_image_name);
            $data['post_image'] = 'public/media/post/'.$post_image_name;
        
            DB::table('posts')->insert($data);
            $notification=array(
                    'messege'=>'Post inséré avec succès',
                    'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
        
            }else{
                $data['post_image']='';
                DB::table('posts')->insert($data);
            $notification=array(
                    'messege'=>'Post inséré sans image',
                    'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
        
                }
    }

    public function index(){
        $post = DB::table('posts')
                ->join('post_category','posts.category_id','post_category.id')
                ->select('posts.*','post_category.category_name_en')
                ->get();
                return view('admin.blog.index',compact('post'));
                // return response()->json($post);

        }


        public function DeletePost($id){
            $post = DB::table('posts')->where('id',$id)->first();
            $image = $post->post_image;
            unlink($image);
            
            DB::table('posts')->where('id',$id)->delete();
                $notification=array(
                        'messege'=>'Post supprimé avec succès',
                        'alert-type'=>'success'
                        );
                        return Redirect()->back()->with($notification);
            
            }

        public function EditPost($id){
            $post = DB::table('posts')->where('id',$id)->first();
            return view('admin.blog.edit',compact('post'));
        
        }

        public function UpdatePost(Request $request,$id){

            $oldimage = $request->old_image;
            
            $data = array();
            $data['post_title_en'] = $request->post_title_en;
            $data['post_title_fr'] = $request->post_title_fr;
            $data['category_id'] = $request->category_id;
            $data['details_en'] = $request->details_en;
            $data['details_fr'] = $request->details_fr;
            
            $post_image = $request->file('post_image');
            
            if ($post_image) {
                unlink($oldimage);
                $post_image_name = hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,200)->save('public/media/post/'.$post_image_name);
                $data['post_image'] = 'public/media/post/'.$post_image_name;
            
                DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                        'messege'=>'Post mis à jour avec succès',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.blogpost')->with($notification);
            
            }else{
                $data['post_image']= $oldimage;
                    DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                        'messege'=>'Post mis à jour sans image',
                        'alert-type'=>'success'
                        );
                        return Redirect()->route('all.blogpost')->with($notification);
            
                    } 
            }
}
