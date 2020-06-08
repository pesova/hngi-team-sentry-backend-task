<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Markdown;

class PagesController extends Controller
{

    // This function will take care of creating the file and writing the markdown content to it.
    // the content will be automatically overwritten when the /set_content_markdown is hit

    public function set_page_markdown(Request $request)
    {
        // retrieve title and content from request payload
        $title = $request->input('page_title');
        $content = $request->input('page_content');

        try {
            // this will create a file on local storage with the markdown extension
            Storage::put($title . '.md', $content);
            return response()->json(['message' => 'Your page has been added successfully']);
        } catch (\Exception $e) {
            // return error response to the user
            return response()->json(['error' => $e]);
        }
    }

    public function retrieve_page_html(Request $request) {
        $title = $request->input('page_title');
        try {
            $markdown = Storage::get($title);
            $html = Markdown::parse($markdown);
            return response()->json(['html_response' => $html]);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e]);
        }
    }
}
