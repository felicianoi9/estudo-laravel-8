<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function index()
    {
        return  view('pdfs.index');
    }
    public function todo($id)
    {
        $posts = Post::find($id);
        $post = new stdClass();
        $post->id = $posts->id;
        $post->title = $posts->title;
        $post->content = $posts->content;
        $post->image = $posts->image;
        $post->created_at = date('d/m/Y H:i:s', strtotime($posts->created_at));
        $post->updated_at = date('d/m/Y H:i:s', strtotime($posts->updated_at));

        $nameFile = Str::slug($post->title, '-').".pdf";
        
        return  PDF::loadView('pdfs.index', compact('post', 'nameFile')) 
                        ->save(storage_path("app/public/pdfs/{$nameFile}"))                       
                        ->stream($nameFile);
        
    }

}
