@extends('layouts.template01')

@section('title', 'Deletar Post')    

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            <a  
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('posts.index') }}" >
                Voltar
            </a>
            
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Personal details and application.
          </p>
        </div>
        <div class="border-t border-gray-200">
          {{-- Formulário --}}
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
                  disabled
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
                disabled
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
                placeholder="Didite seu post">{{ $post->content ?? old('title') }}
                
              </textarea>
            </div>
           
          </div>    
          <form action="{{ route('posts.delete', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"  
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Deletar
            </button>
           
        </form>
        
      {{-- ./Formulario --}}

    </div>
</div>

@endsection

