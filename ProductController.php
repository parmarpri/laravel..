<?php

namespace App\Http\Controllers;
use App\models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index',[
            //'products'=>Product::get()
            //new recode show krne ke liye 
            'products'=>Product::latest()->paginate(5)
        ]);
    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
    //  dd($request->all());
     $request->validate([
        'name'=>'required',
        'description'=>'required',
        'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
     ]);


    // eske liye aap ko validation krna hoga 
    //validation

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'),$imageName);
     
    $product =new product;
    $product->image =$imageName;
    $product->name =$request->name;
    $product->description =$request->description;

    $product->save();
    return back()->withSuccess('product Created !!!');

    // dd($imageName);
    }
    public function edit($id){
        //dd($id); check krne ke liye 
        $product = Product::where('id',$id)->first();

        return view('products.edit',['product'=>$product]);


    }
    public function update(Request $request, $id){
        //dd($request->all());
        //dd($id);
        //check krne ke liye id koun sa update kr rahe hai
             $request->validate([
                'name'=>'required',
                'description'=>'required',
                'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
             ]);
             
             $product = Product::where('id',$id)->first();
        
            if(isset($request)){
                $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image =$imageName;

            }
        
            $product->image =$imageName;
            $product->name =$request->name;
            $product->description =$request->description;
        
            $product->save();
            return back()->withSuccess('product Updated!!!');
        }
          public function destroy($id){
          $product = Product::where('id',$id)->first();
          $product->delete();
          return back()->withSuccess('product deleted!!!');
        }

        public function show($id){
            $product = Product::where('id',$id)->first();
            return view('products.show',['product'=>$product]);
        
        
        }  
    
}


