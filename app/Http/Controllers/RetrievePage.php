<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RetrievePage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page_name = $request->input('page_name');

        if ($page_name === NULL) {
            return response()->json(['code' => 400, 'error' => 'Invalid request message']);
        }

        if (Storage::exists($page_name)) {
            return response()->json(['code' => 200, 'file_content' => Storage::get($page_name)]);
        } else {
            return response()->json(['code' => 404, 'error' => 'File not found']);
        }
    }
}
