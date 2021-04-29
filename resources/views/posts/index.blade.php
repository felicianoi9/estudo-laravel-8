<h1><a style="text-decoration: none; color: black;" href="{{ route('posts.index') }}">Posts List</a> </h1>

@if (session('message'))
    <div>{{ session('message') }}</div>
@endif
<form action="{{ route('posts.search') }}" method="POST">
    @csrf
    <input type="text" name="termo" placeholder="Pesquisar...">
    <button type="submit">Buscar</button>

</form>
<a href="{{ route('posts.create') }}">Novo Post</a>
@if ($posts)

    @foreach ($posts as $post)
        <fieldset style="border: 1px solid blue; border-radius: 10px;">

            <p><b>{{ $post->title }}</b></p>
            <p>{{ $post->content }}</p>
            <p><a href="{{ route('posts.show', $post->id) }}">Ler mais</a></p>
            
        </fieldset>
    @endforeach
    @if ($posts)
        @if (isset($filters))
            {{ $posts->appends($filters)->links() }}
        @else
            {{ $posts->links() }}
        @endif
    @else
        <p>Nenhuma postagem encontrada!!</p>
    @endif
   
@else
    <p>Nenhuma postagem encontrada!!</p>
@endif