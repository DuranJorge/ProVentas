<?php

namespace ProVentas\Http\Controllers\api;

use Illuminate\Http\Request;
use ProVentas\Http\Controllers\Controller;
use ProVentas\Articulo;

class CategoriaController extends Controller
{
    public function create(Request $request){
    	if (Articulo::create($request->all())) {
		return response()->json(['status'=>'ok'],200);
		}else{
		return response()->json(['status'=>'error'],404);
		}
    }

    public function delete($id){
    	$articulo=Articulo::find($id);
    	if ($articulo) {
    		$articulo->delete();
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , articulo no existe'],404);
    	}
    }

     public function edit(Request $request,$id){
    	$articulo=Articulo::find($id);
    	if ($articulo) {
    		$articulo->update($request->all());
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , articulo no existe'],404);
    	}
    }

}
