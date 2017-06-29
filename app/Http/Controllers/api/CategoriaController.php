<?php

namespace ProVentas\Http\Controllers\api;

use Illuminate\Http\Request;
use ProVentas\Http\Controllers\Controller;
use ProVentas\Categoria;

class CategoriaController extends Controller
{
    public function create(Request $request){
    	if (Categoria::create($request->all())) {
		return response()->json(['status'=>'ok'],200);
		}else{
		return response()->json(['status'=>'error'],404);
		}
    }

    public function delete($id){
    	$categoria=Categoria::find($id);
    	if ($categoria) {
    		$categoria->delete();
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , categoria no existe'],404);
    	}
    }

     public function edit(Request $request,$id){
    	$categoria=Categoria::find($id);
    	if ($categoria) {
    		$categoria->update($request->all());
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , categoria no existe'],404);
    	}
    }

}
