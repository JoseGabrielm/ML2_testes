 <!-- Componente app-layout que fica em app/View/Componensts/appLayout -->
  <!-- Esse componente redireciona para views/layouts/app.blade  -->
  <x-app-layout>


    <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Respondedor') }}
            <a href="{{ route('responder.limpar') }}" type="button" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500" >
                Apagar Perguntas
            </a>
        </h2>
    </x-slot>


    <!-- Corpo da pagina - que vai para layouts/app.blade na tag  $slot  -->
    <!-- A tag  $slot não foi definida aqui pois ela já é pre-definida -->
    <div class="flex flex-col m-3">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">item</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">pergunta</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CEP</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quant.</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Resposta</th>
                            <th class="px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($perguntas->sortByDesc('cep')  as $pergunta)
                            <tr>
                                <th class = "px-3 py-1 whitespace-normal"> {{ $pergunta->tbmedida->descricao }}</th>
                                <td class = "px-3 py-1 whitespace-normal" > {{ $pergunta->text}} </td>
                                <td class = "px-3 py-1 whitespace-normal" >{{ $pergunta->cep}}</td>
                                <td class = "px-3 py-1 whitespace-normal text-center" >{{ $pergunta->quant}}</td>
                                <td class = "px-3 py-1 whitespace-normal" >{{ $pergunta->cidade}}</td>
                                <td class = "px-3 py-1 whitespace-normal" >{{ $pergunta->resposta}}</td>
                                <td class = "px-3 py-1 whitespace-normal" >
                                <a href=" {{ route('responder.tudo', ['pergunta_id' => $pergunta->id])  }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/quadrado.png" width="20" height="20" >
                                </a>
                                <a href="#">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/quadro.png" width="18" height="18" >
                                </a>
                                <a href=" {{ route('responder.excluir', ['pergunta_id' => $pergunta->id])  }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/excluir1.png" width="20" height="20" >
                                </a>
                                <a href=" {{ route('responder.editar', ['pergunta_id' => $pergunta->id])  }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/editar3.jpg" width="19" height="19" >
                                </a>
                                <a href=" {{ route('responder.fretado', ['pergunta_id' => $pergunta->id, 'item_id' => $pergunta->item_id]) }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/caminhao1.png" width="20" height="20" >
                                </a>
                                <a href=" {{ route('responder.gerar', ['pergunta_id' => $pergunta->id])  }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/r3.png" width="18" height="18" >
                                </a>
                                <a href=" {{ route('responder.enviar', ['pergunta_id' => $pergunta->id]) }} ">
                                    <input type="image" src="https://www.supreme.ind.br/imagem/icones/ok.png" width="20" height="20" >
                                </a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</x-app-layout>
