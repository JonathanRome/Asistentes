<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Editorial;

class ProductController extends Controller
{
    public function index()
    {
          $products = Product::orderBy('id','desc')->paginate(20);
        return view('admin.products.index')->with(compact('products'));
    }
     public function create()
    {
        $editorials = Editorial::get();
        $categories = Category::get();
        return view('admin.products.create')->with(compact('categories','editorials'));
    }
     public function store(Request $request)
    {
        //dd($request->all());
        $this->validar($request,'required|min:3|unique:products|max:100');
    
      $product=new Product();
      $product->name=$request->input('name');
      $product->author=$request->input('author');
      $product->category_id=$request->category_id;
      $product->editorial_id=$request->editorial_id;
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->price_purchase=$request->input('price_purchase');
      $product->num_pages=$request->input('num_pages');
      $product->isbn=$request->input('isbn');
      $product->quantity=$request->input('quantity');
      $product->discount=$request->input('discount');
      
      $product->save();
      return redirect('/admin/products/'.$product->id.'/images');
    }
     public function edit($id)
    {
        $categories = Category::orderBy('id','desc')->get();
        $editorials = Editorial::orderBy('id','desc')->get();
        $product=Product::find($id);
        return view('admin.products.edit')->with(compact('product','categories','editorials'));
    }
     public function update(Request $request,$id)
    {
      //dd($request->input('price'));
      $this->validar($request,'required|min:3|max:100');
      $product=Product::find($id);
      $product->name=$request->input('name');
      $product->author=$request->input('author');
      $product->category_id=$request->category_id;
      $product->editorial_id=$request->editorial_id;
      $product->description=$request->input('description');
      $product->price=$request->input('price');
      $product->price_purchase=$request->input('price_purchase');
      $product->num_pages=$request->input('num_pages');
      $product->isbn=$request->input('isbn');
      $product->quantity=$request->input('quantity');
      $product->discount=$request->input('discount');
      $product->save();
      return redirect('/admin/products/'.$product->id.'/images');
    }
       public function destroy($id)
    {
        //dd($request->all());
      $product=Product::find($id);
      $product->delete();
      return back();
    }

    public function validar($request,$unique)
    {
    	$messages=[
    		'name.required'=>'Es necesario ingresar el nombre del libro.',
        'name.min'=>'El libro debe tener al menos 3 caracteres.',
        'name.max'=>'El libro debe tener maximo 100 caracteres.',
        'name.unique'=>'El libro ya fue registrado.',
        'author.required'=>'Es necesario ingresar el autor',
        'author.min'=>'El autor debe tener al menos 3 caracteres.',
        'author.max'=>'El autor debe tener maximo 100 caracteres.',
        'author.unique'=>'El autor ya fue registrado.',
        'description.max'=>'La descripcion solo admite hasta 1000 caracteres.',
        'price.required'=>'Es necesario ingresar el precio',
        'price.numeric'=>'El precio debe ser numérico.',
        'price_purchase.required'=>'Es necesario ingresar el precio',
        'price_purchase.numeric'=>'El precio debe ser numérico.',
        'num_pages.required'=>'Es necesario ingresar el numero de paginas',
        'num_pages.numeric'=>'El numero de paginas debe ser numérico.',
        'isbn.required'=>'Es necesario ingresar el isbn',
        'isbn.numeric'=>'El isbn debe ser numérico.',
        'quantity.required'=>'Es necesario ingresar la cantidad',
        'quantity.numeric'=>'La cantidad debe ser numérico.',
    	];

    	$rules=[
        'name'=>$unique,
        'author'=>$unique,
        'description'=>'required|max:900',
        'price'=>'required|numeric',
        'price_purchase'=>'required|numeric',
        'num_pages'=>'required|numeric',
        'isbn'=>'required|numeric',
        'quantity'=>'required|numeric',
    	];
      $this->validate($request,$rules,$messages);
      
     
    }
}
