<h2>Editar Post</h2>
@if ($errors->any())    
    @foreach ($errors->all() as $error)
        <div style="background-color: red; color: #fff; border-radius:4px; text-align: center;width:400px;margin:5px;padding:5px">
            {{ $error }}        
        </div>
        
    @endforeach
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    @include('posts._partials.form')
    
</form>