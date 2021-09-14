<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty($request->image)) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('storage/produk-image'), $imageName);
        }
        $input['image'] = $imageName;
        /* Store $imageName name in DATABASE from HERE */
        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
