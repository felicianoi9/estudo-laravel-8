@extends('layouts.template01')

@section('title', 'Novo Post')    

@section('content')
    
    @if ($errors->any())    
        @foreach ($errors->all() as $error)
            <div class="bg-clip-border text-red-600 text-center p-6 bg-red-50 border-4 border-red-300 border-dashed">
                {{ $error }}        
            </div>
            
        @endforeach
    
    @endif

    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        <a  
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('posts.index') }}">
            Voltar
        </a>
        
      </h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Personal details and application.
      </p>
    </div>
    <div class="border-t border-gray-200">
      {{-- Formulário --}}

<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      
      <div class="mt-5 md:mt-0 md:col-span-5">
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="flex-shrink-0 h-50 w-50">
                <img 
                    class="h-50 w-50 "
                    src="{{ url("storage/{$post->image}") }}" 
                    alt="">
            
              </div>
              <div class="grid grid-cols-2 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company_website" class="block text-sm font-medium text-gray-700">
                    Título
                  </label>
                  <div class="mt-1 flex rounded-md shadow-sm">                   
                    <input 
                      type="text" 
                      name="title" 
                      id="title" 
                      class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                      placeholder="Digite o título do post"
                      value="{{ $post->title ?? old('title') }}">
                  </div>
                </div>
              </div>
  
              <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                  Post
                </label>
                <div class="mt-1">
                  <textarea 
                    id="content" 
                    name="content" 
                    rows="5" 
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
                    placeholder="Didite seu post">{{ $post->content ?? old('title') }}
                    
                  </textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                  No máximo 10.000 caracteres.
                </p>
              </div>             
  
              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Imagem do Post
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload de imagem</span>
                        <input id="file-upload" name="image" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">ou arraste e solte</p>
                    </div>
                    <p class="text-xs text-gray-500">
                      PNG, JPG, GIF up to 10MB
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
  
      {{-- ./Formulario --}}

    </div>
</div>


@endsection