
<p>
    <input type="text" name="title" id="" placeholder="Título" value="{{$post->title ?? old('title') }}">
</p>

<p>
    <textarea name="content"  id="" cols="30" rows="10" placeholder="Post">{{$post->content  ?? old('content') }}</textarea>
</p>

<p>
    <input type="submit" value="Salvar">
</p>