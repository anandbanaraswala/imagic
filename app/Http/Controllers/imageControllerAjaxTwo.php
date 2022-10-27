<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imageControllerAjax extends Controller
{
    public function result(Request $request)
    {
        if($request->file('file'))
        {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            // File extension
            $extension = $file->getClientOriginalExtension();

            // File upload location
            $location = 'files';

            // Upload file
            $file->move($location,$filename);

            // File path
            $filepath = url('files/'.$filename);

            // Response
            $data['success'] = 1;
            $data['message'] = 'Uploaded Successfully!';
            $data['filepath'] = $filepath;
            $data['extension'] = $extension;
        }
        else
        {
            $data['success'] = 2;
            $data['message'] = 'File not uploaded.';
        }

        return response()->json($data);
    }
}
