@extends('layouts.template01')

@section('title', 'Listagem dos Posts')    

@section('content')
    @if (session('message'))
        <div class="bg-clip-border text-blue-600 text-center p-6 bg-blue-50 border-4 border-blue-300 border-dashed">
            {{ session('message') }}
        </div>
    @endif

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                <a  
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('posts.create') }}">
                    Novo Post
                </a>
                
            </h3>
            <div class="mt-1 grid grid-cols-2 gap-4">
                <div class="mt-1 max-w-2xl ">
                    
                    <form action="{{ route('posts.search') }}" method="POST">
                        @csrf
                        <input class="py-2 rounded-lg " type="text" name="termo" placeholder="Pesquisar...">
                        <button class="bg-green-400 py-2 px-2 rounded-lg  hover:bg-green-900 text-white" type="submit">Buscar</button>
                
                    </form>
                </div>
                <div>

                    <p class="mt-1 max-w-2xl  text-gray-500 ">
                        @if ($posts)
                                @if (isset($filters))
                                    {{ $posts->appends($filters)->links() }}
                                @else
                                    {{ $posts->links() }}
                                @endif
                            @else
                                <p>Nenhuma postagem encontrada!!</p>
                            @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200 ">
        {{-- Tabela --}}

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Titulo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Post
                            </th>
                        
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img 
                                        class="h-10 w-10 rounded-full"
                                        src="{{ url("storage/{$post->image}") }}" 
                                        alt="">
                                
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{ $post->title }}
                                    </div>
                                   
                                </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-wrap">                                
                                <div  class="text-sm text-gray-500 ">
                                    <p>
                                        {{ $post->content }}

                                    </p>
                                
                                </div>
                            </td>
                        
                            <td class="px-6 py-4  whitespace-normal space-x-2 text-right text-sm font-medium">
                                <a 
                                    href="{{ route('posts.show', $post->id) }}" 
                                    class="text-white rounded-full py-3 px-4 bg-blue-400 hover:bg-blue-900">
                                    Detalhes
                                </a>

                                <a 
                                    href="{{ route('posts.edit', $post->id) }}" 
                                    class="text-white  rounded-full py-3 px-4 bg-red-400 hover:bg-red-900">
                                    Edit
                                </a>
                            </td>
                        </tr>
                       
                   @endforeach
                   

                    <!-- More people... -->
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>

        {{-- ./Tabela --}}

        </div>
    </div>


@endsection