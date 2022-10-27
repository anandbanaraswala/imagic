<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Session;

class imageControllerAjax extends Controller
{
    public function result(Request $request)
    {
        if($request->file('file'))
        {
            $image = $request->file('file');
            $input['imagename'] = time().'.'.$image->extension();
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
            $a = session(['imagename' => 'sss']);
            return response(array("message"=>$a),200)->header("Content-Type","application/json");
        }

    }
}
