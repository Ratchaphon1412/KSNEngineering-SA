<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productImage;

class productController extends Controller
{
    public function view(){
        return view('product.index');
    }

    public function upload(Request $request){
        $productImage = new productImage();
        $productImage->product_id = 1;
        $productImage->type = 'product';
        if ($request->hasFile('image_path')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'artist_images' ที่ storage/app/public
            $path = $request->file('image_path')->store('product', 'public');
            $productImage->imageUrl = $path;
        }
        
        $productImage->save();
        return redirect()->back();
    }
}
