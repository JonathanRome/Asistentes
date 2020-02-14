<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
      if(!$request->ajax())return redirect('/');
      
      $buscar=$request->buscar;
      $criterio=$request->criterio;
      if($buscar=='')
      {
        $categories = Category::orderBy('id','desc')->paginate(10);
      }
      else
      {
        $categories = Category::where($criterio,'like','%'.$buscar.'%')->orderBy('id','desc')->paginate(10);
      }
     
      // return view('admin.categories.index')->with(compact('categories'));

      return 
      [
        'pagination'=> 
        [
          'total'=>$categories->total(),
          'current_page'=>$categories->currentPage(),
          'per_page'=>$categories->perPage(),
          'last_page'=>$categories->lastPage(),
          'from'=>$categories->firstItem(),
          'to'=>$categories->lastItem(),
        ],
        'categorias'=>$categories
      ];
    }

    //  public function create()
    // {
    //     return view('admin.categories.create');
    // }

     public function store(Request $request)
    {
    	$this->validar($request);
      //dd($request->all());
      $category=new Category();
      $category->name=$request->input('name');
      $category->description=$request->input('description');
      $category->save();
      // return redirect('/admin/categories');
    }

    //  public function edit($id)
    // {
    //     $category=Category::find($id);
    //     return view('admin.categories.edit')->with(compact('category'));
    // }

     public function update(Request $request)
    {
      //dd($request->all());
      $this->validar($request);
      $category=Category::find($request->id);
      $category->name=$request->input('name');
      $category->description=$request->input('description');
      $category->save();
      // return redirect('/admin/categories');
    }

    public function destroy(Request $request)
    {
        
      $category=Category::find($request->id);
      $products=$category->products;
      //las los productos de las categorias eliminadas toman id 1, es decir la primera categoria debe ser general
      foreach ($products as $product) {
        $product->category_id=1;
        $product->save();
      }

      //dd($products->name);
      $category->delete();
      // return back();
    }

    public function validar($request)
    {
    	$messages=[
    		'name.required'=>'Es necesario ingresar el nombre para la categoria.',
    		'name.min'=>'El nombre de la categoria debe tener al menos 3 caracteres.',
    		'description.max'=>'La descripcion solo admite hasta 250 caracteres.'

    	];

    	$rules=[
    		'name'=>'required|min:3|max:50',
    		'description'=>'max:500'
    	];
    	$this->validate($request,$rules,$messages);
    }

   
}
