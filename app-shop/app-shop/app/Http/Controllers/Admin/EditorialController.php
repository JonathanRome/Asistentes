<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editorial;
class EditorialController extends Controller
{
    public function index(Request $request)
    {
      if(!$request->ajax())return redirect('/');
      $buscar=$request->buscar;
      $criterio=$request->criterio;
      if($buscar=='')
      {
        $editoriales= Editorial::orderBy('id','desc')->paginate(10);
      }
      else
      {
        $editoriales = Editorial::where($criterio,'like','%'.$buscar.'%')->orderBy('id','desc')->paginate(10);
      }
      return 
      [
        'pagination'=> 
        [
          'total'=>$editoriales->total(),
          'current_page'=>$editoriales->currentPage(),
          'per_page'=>$editoriales->perPage(),
          'last_page'=>$editoriales->lastPage(),
          'from'=>$editoriales->firstItem(),
          'to'=>$editoriales->lastItem(),
        ],
        'editoriales'=>$editoriales
      ];
      // return view('admin.editoriales.index')->with(compact('editoriales'));
    }

    //  public function create()
    // {
    //     return view('admin.editoriales.create');
    // }

     public function store(Request $request)
    {

      $this->validar($request,'required|min:3|max:100|unique:editorials');
      //dd($request->all());
      $editorial=new Editorial();
      $editorial->name=$request->input('name');
      $editorial->tel=$request->input('tel');
      $editorial->email=$request->input('email');
      $editorial->nota=$request->input('nota');
      
      $editorial->save();
      // return redirect('/admin/editoriales');
    }

    //  public function edit($id)
    // {
    //     $editorial=Editorial::find($id);
    //     return view('admin.editoriales.edit')->with(compact('editorial'));
    // }

     public function update(Request $request)
    {
      //dd($request->all());
      $this->validar($request,'required|min:3|max:100');
      $editorial=Editorial::find($request->id);
      $editorial->name=$request->input('name');
      $editorial->tel=$request->input('tel');
      $editorial->email=$request->input('email');
      $editorial->nota=$request->input('nota');
      $editorial->save();
      // return redirect('/admin/editoriales');
    }

    public function destroy(Request $request)
    {
        
      $editorial=Editorial::find($request->id);
      
      $products=$editorial->products;
      //las los productos de las categorias eliminadas toman id 1, es decir la primera categoria debe ser general
      foreach ($products as $product) {
        $product->editorial_id=1;
        $product->save();
      }

      //dd($products->name);
      $editorial->delete();
      // return back();
    }

    public function validar($request,$unique)
    {
    	$messages=[
        'name.required'=>'Es necesario ingresar el nombre.',
        'name.unique'=>'El editorial ya fue registrado.',
        'tel.required'=>'Es necesario ingresar telefono',
        'name.min'=>'El nombre del editorial debe tener al menos 3 caracteres.',
        'tel.numeric'=>'El telefono debe ser numérico.',
        'name.max'=>'El nombre del editorial debe tener maximo 100 caracteres.',
        'email.email'=>'Email invalido.'
        
      ];
      
    	$rules=[
        'name'=>$unique,
        'tel'=>'required|numeric',
        'email'=>'email',
    	];
    	$this->validate($request,$rules,$messages);
    }

}
