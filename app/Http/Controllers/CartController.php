<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;

class CartController extends Controller
{
    public function AddCart($id){
        $product = DB::table('products')->where('id',$id)->first();

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $product->product_color;
            $data['options']['size'] = $product->product_size;
                Cart::add($data);
                return \Response::json(['success' => 'Produit ajouté au panier']);
        }else{
        
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $product->product_color;
            $data['options']['size'] = $product->product_size;
                Cart::add($data);
                return \Response::json(['success' => 'Produit ajouté au panier']);
        
        }
    }

    public function check(){
        $content = Cart::content();
        return response()->json($content);
    }

    public function ShowCart(){
        $cart = Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function removeCart($rowId){
        Cart::remove($rowId);
        $notification=array(
                        'messege'=>'Produit retiré du panier',
                        'alert-type'=>'warning'
                            );
                        return Redirect()->back()->with($notification);

    }

    public function UpdateCart(Request $request){

        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $notification=array(
                        'messege'=>'Quantité du produit mise à jour',
                        'alert-type'=>'success'
                            );
                        return Redirect()->back()->with($notification);

    }

    public function ViewProduct($id){
        $product = DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->join('brands','products.brand_id','brands.id')
                ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                ->where('products.id',$id)
                ->first();

                $color = $product->product_color;
                $product_color = explode(',', $color);
                
                $size = $product->product_size;
                $product_size = explode(',', $size);

                return response::json(array(
                    'product' => $product,
                    'color' => $product_color,
                    'size' => $product_size,
                ));
    }

    public function insertCart(Request $request){
        $id = $request->product_id;
        $product = DB::table('products')->where('id',$id)->first();
        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;

    $data = array();

    if ($product->discount_price == NULL) {
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = $request->qty;
        $data['price'] = $product->selling_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['color'] = $request->color;
        $data['options']['size'] = $request->size;
        Cart::add($data);
        $notification=array(
                            'messege'=>'Produit ajouté au panier',
                            'alert-type'=>'success'
                            );
                        return Redirect()->back()->with($notification);
    }else{

        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['qty'] = $request->qty;
        $data['price'] = $product->discount_price;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['color'] = $request->color;
        $data['options']['size'] = $request->size;
        Cart::add($data);
        $notification=array(
                            'messege'=>'Produit ajouté au panier',
                            'alert-type'=>'success'
                            );
                        return Redirect()->back()->with($notification);

        }

    }

        public function Checkout(){
            if (Auth::check()) {
            
                $cart = Cart::content();
                    return view('pages.checkout',compact('cart'));
            
            }else{
                $notification=array(
                                    'messege'=>'Veuillez vous connecter',
                                    'alert-type'=>'error'
                                    );
                                    return Redirect()->route('login')->with($notification);
            } 
            
                }

        public function wishlist(){
            $userid = Auth::id();
            $product = DB::table('wishlists')
                    ->join('products','wishlists.product_id','products.id')
                    ->select('products.*','wishlists.user_id')
                    ->where('wishlists.user_id',$userid)
                    ->get();
                    // return response()->json($product);
                    return view('pages.wishlist',compact('product'));
            
            }

            public function Coupon (Request $request){
                $coupon = $request->coupon;

                $check = DB::table('coupons')->where('coupon',$coupon)->first();

                if ($check) {
                    Session::put('coupon',[
                    'name' => $check->coupon,
                    'discount' => $check->discount,
                    'balance' => Cart::Subtotal()-$check->discount 
                    ]);
                        $notification=array(
                                        'messege'=>'Coupon appliqué avec succès',
                                        'alert-type'=>'success'
                                            );
                                        return Redirect()->back()->with($notification);
                
                
                    }else{
                        $notification=array(
                                        'messege'=>'Coupon invalide',
                                        'alert-type'=>'warning'
                                            );
                                        return Redirect()->back()->with($notification);
                    }
                
            }

            public function CouponRemove(){
                Session::forget('coupon');
                $notification=array(
                                    'messege'=>'Coupon retiré',
                                    'alert-type'=>'warning'
                                    );
                                    return Redirect()->back()->with($notification);
            
            }

            public function PaymentPage(){

                $cart = Cart::Content();
                return view('pages.payment',compact('cart'));
                
                }

    public function Search(Request $request){

        $item = $request->search;
        // echo "$item";
        
        $products = DB::table('products')
                    ->where('product_name','LIKE',"%$item%")
                    ->paginate(20);
        
            return view('pages.search',compact('products'));
        }
}
