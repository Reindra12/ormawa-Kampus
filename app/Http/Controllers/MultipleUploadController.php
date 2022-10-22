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

