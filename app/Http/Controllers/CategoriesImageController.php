      function uploadimage(Request $request)
    {
        // $image = $request->file('image');
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('');
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
