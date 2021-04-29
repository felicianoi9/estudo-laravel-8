<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use stdClass;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id', 'DESC')->paginate(10);
        $posts = Post::latest()->paginate(1);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $post = Post::create($request->all());
       

        return redirect()->route('posts.index')
                         ->with('message', 'Criado com Sucesso!!');
    }
    public function show($id)
    {
        $posts = Post::find($id);
        $post = new stdClass();
        $post->id = $posts->id;
        $post->title = $posts->title;
        $post->content = $posts->content;
        $post->created_at = date('d/m/Y H:i:s', strtotime($posts->created_at));
        $post->updated_at = date('d/m/Y H:i:s', strtotime($posts->updated_at));

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        if(!$posts = Post::find($id)){
            return redirect()->back();
        }
        $post = new stdClass();
        $post->id = $posts->id;
        $post->title = $posts->title;
        $post->content = $posts->content;
        $post->created_at = date('d/m/Y H:i:s', strtotime($posts->created_at));
        $post->updated_at = date('d/m/Y H:i:s', strtotime($posts->updated_at));

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $post->update($request->all());       

        return redirect()->route('posts.index')
                         ->with('message', 'Alterado com Sucesso!!');
    }
    public function destroy($id )
    {
        if(!$posts = Post::find($id)){
            return redirect()->route('posts.index');
        }
        $posts->delete();

        return redirect()->route('posts.index')
                         ->with('message', 'Deletado com Sucesso!!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $posts = Post::where('title', 'LIKE', "%{$request->termo}%")
                        ->orWhere('content', 'LIKE', "%{$request->termo}%")
                        ->paginate(1);
        // $posts = Post::orderBy('id', 'DESC')->paginate(10);
       

        return view('posts.index', compact('posts', 'filters'));
    }
}
