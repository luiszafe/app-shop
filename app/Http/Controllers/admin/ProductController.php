<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
   public function index() //listado
   {
   	$products = Product::paginate(10);
   		return view('admin.products.index')->with(compact('products'));
   }

    public function create() //formulario de registro 
   {
   		return view('admin.products.create');
   }

    public function store(Request $request) //registrar nuevos productos
   {
   	//dd($request->all());

   	//validacion
   	$rules = [
   		'name' => 'required|min:3',
   		'description' => 'required|max:200',
   		'price' => 'required|numeric|min:0',
   	];
   	$this->validate($request, $rules);


   	$product = new Product();
   	$product->name = $request->input('name');
	$product->description = $request->input('description');
	$product->price = $request->input('price');
	$product->long_description = $request->input('long_description');
	$product->save();

		return redirect('admin/products');
   }

    public function edit($id)  
   {
   		$product = Product::find($id);
   		return view('admin.products.edit')->with(compact('product'));
   }

    public function update(Request $request, $id) 
   {
	//validacion
   	$rules = [
   		'name' => 'required|min:3',
   		'description' => 'required|max:200',
   		'price' => 'required|numeric|min:0',
   	];
   	$this->validate($request, $rules);
   	
   	$product = Product::find($id);
   	$product->name = $request->input('name');
	$product->description = $request->input('description');
	$product->price = $request->input('price');
	$product->long_description = $request->input('long_description');
	$product->save();

		return redirect('admin/products');
   }

    public function destroy($id)  
   {
   		$product = Product::find($id);
   		$product->delete();

   		//return redirect('admin/products');
   		return back(); //como el user ya esta ubicado en el fom products, solo hacemos un back
   }



}
