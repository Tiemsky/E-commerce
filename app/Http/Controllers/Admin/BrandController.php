<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    const BRAND_GlOBAL_PUBLIC_PATH = 'media/brand/';
   
    public function index()
    {
        $brands = Brand::query()
                        ->latest()
                        ->get();
        return view('admin.brand.index',compact('brands'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required|unique:brands|max:55'],
            ['brand_name.required' => 'Veuillez entrer le nom de la marque'],
            ['brand_name.unique' => 'Cette marque est déjà prise']
            );
            $image_url = $this->uploadFile($request, 'brand_logo');
            /*
            *Adding slug and logo to the collection
            */
            $data['brand_slug'] = Str::slug($request->brand_name);
            $data['brand_logo'] = $image_url;
            Brand::query()
                    ->create($data);
            $notification=array(
                    'messege'=>'Marque insérée avec succès',
                    'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);

    }


    public function edit($slug)
    {
        $brand = Brand::query()
                        ->where('brand_slug', $slug)
                        ->first();
        return view('admin.brand.edit',compact('brand'));
    }


    public function update(Request $request, $slug)
    {
        
        $oldlogo = $request->old_logo;
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name);
        $image_url = $this->uploadFile($request, 'brand_logo');
        if($image_url){
            unlink($oldlogo);
            $data['brand_logo'] = $image_url;
        }
        $notification=array(
            'messege'=>'La marque a été actualisée avec succès',
            'alert-type'=>'success'
                );
        Brand::where('brand_slug',$slug)->update($data);
        return Redirect()->route('brand.index')->with($notification);
    }

    public function destroy($id)
    {
        $data = Brand::query()
                        ->where('id',$id)
                        ->first();
        unlink($data->brand_logo);
        Brand::query()
                ->where('id',$id)
                ->delete();
        $notification=array(
                    'messege'=>'Marque supprimée avec succès',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }


    protected function uploadFile($request,$file_name){
        $image = $request->file($file_name);
        if ($image) {
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $image_url = self::BRAND_GlOBAL_PUBLIC_PATH.$image_full_name;
        $image->move(self::BRAND_GlOBAL_PUBLIC_PATH,$image_full_name);
        return $image_url;
    }
    }
}
