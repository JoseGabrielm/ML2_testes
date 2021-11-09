<!-- Componente app-layout que fica em app/View/Componensts/appLayout -->
<!-- Esse componente redireciona para views/layouts/app.blade  -->
<x-app-layout>


    <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importar Perguntas') }}
        </h2>
    </x-slot>


    <!-- Corpo da pagina - que vai para layouts/app.blade na tag  $slot  -->
    <!-- A tag  $slot não foi definida aqui pois ela já é pre-definida -->
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- conteudo do corpo principal -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col">Perguntas Salvas - {{ $quantidade }}</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($perguntas as $pergunta)
                          <tr>
                            <td>
                                {{  $pergunta }}
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>

                @php
                //print_r($quantidade);
                //print_r($perguntas);
                @endphp



                <!-- fim do conteudo do corpo principal -->
            </div>
        </div>
    </div>


</x-app-layout>
