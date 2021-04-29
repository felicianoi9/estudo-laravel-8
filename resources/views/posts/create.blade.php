<h2>Novo Post</h2>
@if ($errors->any())    
    @foreach ($errors->all() as $error)
        <div style="background-color: red; color: #fff; border-radius:4px; text-align: center;width:400px;margin:5px;padding:5px">
            {{ $error }}        
        </div>
        
    @endforeach
@else
    
@endif
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts._partials.form')
</form>