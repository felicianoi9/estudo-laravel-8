<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id', 'DESC')->paginate(10);
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        if(isset($request->image) && $request->image->isValid()){
            $nameFile = Str::slug($request->title, '-').".".$request->image->getClientOriginalExtension();
            // $image = $request->image->store('posts');
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $post = Post::create($data);
       

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
        $post->image = $posts->image;
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
        $post->image = $posts->image;
        $post->created_at = date('d/m/Y H:i:s', strtotime($posts->created_at));
        $post->updated_at = date('d/m/Y H:i:s', strtotime($posts->updated_at));

        return view('posts.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        if(!$post = Post::find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        if(isset($request->image) && $request->image->isValid()){
            if (Storage::exists($post->image))
                Storage::delete($post->image);

            $nameFile = Str::slug($request->title, '-').".".$request->image->getClientOriginalExtension();
            // $image = $request->image->store('posts');
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }
        
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        $post->update($data);       

        return redirect()->route('posts.index')
                         ->with('message', 'Alterado com Sucesso!!');
    }
    public function destroy($id )
    {
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        if (Storage::exists($post->image))
            Storage::delete($post->image);

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('message', 'Deletado com Sucesso!!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $posts = Post::where('title', 'LIKE', "%{$request->termo}%")
                        ->orWhere('content', 'LIKE', "%{$request->termo}%")
                        ->paginate(5);
        // $posts = Post::orderBy('id', 'DESC')->paginate(10);
       

        return view('posts.index', compact('posts', 'filters'));
    }
}
