<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class CategoriesImageController extends Controller
{

    
      function uploadimage(Request $request)
    {
        // $image = $request->file('image');
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('/assets/images/categories');
        $image = $request->file('image')->move(public_path('/assets/images/categories'),$name);
 
 
        $save = new Categories;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
        return response()->json([
            'status' => true,
            'message' => 'OK!',
            'errors' => null,
            
        ],200);
    
 
    }

    function getCategories(){
        $query = DB::table('categories')->get(); 
        return response()->json([
            'status' => true,
            'message' => 'OK!',
            'errors' => null,
            'data' => $query,
        ]);
    
    }
}

