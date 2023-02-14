<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
                                ->latest()
                                ->get();
        return view ('admin.category.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'],
            ['category_name.required' => 'veuillez préciser le nom de la catégorie.',
            'category_name.unique' => 'ce nom est déjà pris.'
            ]);
        $category = new Category();
        $category->category_name =$request->category_name;
        $category->category_slug =Str::slug($request->category_name);
        $category->save();
        $notification=array(
        'messege'=>'Catégorie ajoutée avec succès',
        'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function edit($slug)
    {
        $category = Category::query()
                                ->where('category_slug',$slug)
                                ->first();
        return view('admin.category.edit_category',compact('category'));
    }


    public function update(Request $request, $slug)
    {

        $validateData = $request->validate(
            ['category_name' => 'required|max:255|unique:categories,category_name'],
            [
                'category_name.required' => 'veuillez préciser le nom de la catégorie.',
                'category_name.unique' => 'aucune modification n\'a été effectuée.'
            ]);
            
            
            $data=array();
            $data['category_name']=$request->category_name;
            $data['category_slug']=Str::slug($request->category_name) ;
            $update=DB::table('categories')->where('category_slug',$slug)->update($data);
            if ($update) {
                    $notification=array(
                        'messege'=>'Catégorie mise à jour avec succès',
                        'alert-type'=>'success'
                        );
                    
            }else{
                $notification=array(
                        'messege'=>'Rien à actualiser',
                        'alert-type'=>'error'
                        );
            }
            return Redirect()->route('category.index')->with($notification);
    }

    public function destroy($id)
    {
        Category::query()
                    ->where('id',$id)
                    ->delete();
        $notification=array(
            'messege'=>'Catégorie supprimée avec succès',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
}
