<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
 
 	public function update()
 	{
 		$cart = auth()->user()->cart;
 		$cart->Status = 'Pending';
 		$cart->save();

 		$msg ="Tu pedido fué registrado con éxito. En breve te contactaremos por Email";
 		return back()->with(compact('msg'));
 	}
}
