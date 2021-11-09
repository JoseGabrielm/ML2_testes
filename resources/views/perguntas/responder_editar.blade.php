<!-- Componente app-layout que fica em app/View/Componensts/appLayout -->
<!-- Esse componente redireciona para views/layouts/app.blade  -->
<x-app-layout>


    <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pergunta') }}
        </h2>
    </x-slot>

    @php
        //dd($pergunta);
        //$pergunta_id = $pergunta->id;
        //echo $pergunta_id;
    @endphp

    <!-- Corpo da pagina - que vai para layouts/app.blade na tag  $slot  -->
    <!-- A tag  $slot não foi definida aqui pois ela já é pre-definida -->
    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- conteudo do corpo principal -->

                <div class="container my-5">

                    <form action="{{ route('responder.update', ['pergunta_id' => $pergunta->id]) }}" class="form"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-3 m-4">

                            <div class="flex place-items-center">
                                <label for="text" class="w-24 font-bold text-xl text-gray-700 align-middle">text </label>
                                <textarea name="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring" rows="3"
                                    disabled>{{ $pergunta->text }}</textarea>
                            </div>

                            <div class="flex place-items-center">
                                <label for="quant" class="w-24 font-bold text-xl text-gray-700 align-middle">quant </label>
                                <input type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring" name="quant" value="{{ $pergunta->quant }}">
                            </div>

                            <div class="flex place-items-center">
                                <label for="cep" class="w-24 font-bold text-xl text-gray-700 align-middle">cep </label>
                                <input type="text" class="fblock w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring" name="cep" value="{{ $pergunta->cep }}">
                            </div>

                            <div class="flex place-items-center">
                                <label for="cidade" class="w-24 font-bold text-xl text-gray-700 align-middle">cidade </label>
                                <input type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring" name="cidade" value="{{ $pergunta->cidade }}">
                            </div>

                            <div class="flex place-items-center">
                                <label for="item_id" class="w-24 font-bold text-xl text-gray-700 align-middle">item_id</label>
                                <input type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring" name="item_id"
                                    value="{{ $pergunta->item_id }}" disabled>
                            </div>

                            <div class="flex place-items-center">
                                <label for="resposta" class="w-24 font-bold text-xl text-gray-700">resposta </label>
                                <textarea name="resposta" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-t-md focus:border-blue-300 0 focus:outline-none focus:ring"
                                    rows="3">{{ $pergunta->resposta }}</textarea>
                            </div>

                        </div>

                        <div class="flex justify-start mt-6 ml-28">
                            <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                Salvar
                            </button>
                        </div>
                        
                    </form>


                </div>


                <!-- fim do conteudo do corpo principal -->
            </div>
        </div>
    </div>


</x-app-layout>
