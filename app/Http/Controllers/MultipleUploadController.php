<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Image;
use App\Models\Photo;
use Validator;

class MultipleUploadController extends Controller
{
    // function upload(Request $request){

    //     $image = $request->file('image');
    //     if($request->hasFile('image')){
    //         $new_name = rand().'.'.$image->getClientOriginalExtension();
    //         $image->move(public_path('/public/assets/images/categories'),$new_name);
    //         return response()->json($new_name);

    //     }else{
    //         return response()->json('image null');
    //     }
    // }

    
    function uploadMultiple(Request $request){
    
        $images = $request->file('image');
        $imageName='';
        foreach($images as $image){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/assets/images/categories'),$new_name);
            $imageName=$imageName.$new_name.",";
        }
        $imagedb=$imageName;
        return response()->json($imagedb);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

       ]);

       $name = $request->file('image')->getClientOriginalName();

       $path = $request->file('image')->store('');


       $save = new Photo;

       $save->name = $name;
       $save->path = $path;

       $save->save();
        // } else {
        //     return response()->json(['invalid_file_format'], 422);
        // }
 
        return response()->json(['file_uploaded'], 200);
 
    }


    public function addCategory(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $save = new Categories;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
        return redirect('upload-image')->with('status', 'Image Has been uploaded');
 
    }
}
 
// }
