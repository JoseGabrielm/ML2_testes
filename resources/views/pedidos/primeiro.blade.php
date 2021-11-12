<!-- Componente app-layout que fica em app/View/Componensts/appLayout -->
<!-- Esse componente redireciona para views/layouts/app.blade  -->
<x-app-layout>


    <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importação de pedidos ML') }}
        </h2>
    </x-slot>


    <!-- Corpo da pagina - que vai para layouts/app.blade na tag  $slot  -->
    <!-- A tag  $slot não foi definida aqui pois ela já é pre-definida -->
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- conteudo do corpo principal -->

                <div class="container mx-5 my-5">

                    <div class="flex flex-col">
                        <div class="">
                            <table class="">
                                <thead >
                                    <tr class="grid grid-cols-12">
                                        <th class="col-span-3">Pedidos</th>
                                        <th class="col-span-2">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedidos as $pedido)
                                    <?php //dd($pedidos)?>
                                    <tr class="grid grid-cols-12 gap-8 ">
                                        <td class="col-span-3 text-3xl text-right">
                                            {{ $pedido->pedido }}
                                        </td>
                                        <td class="col-span-2 ml-20">
                                            <a href=" {{ route('pedidos.excluir', ['pedido_id' => $pedido->id]) }} ">
                                                <input type="image" src="https://www.supreme.ind.br/imagem/icones/excluir2.jpg" width="30" height="30" >
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <form action="{{ route('leitor.ler') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            ...

                            <button type="submit">Selecionar arquivos</button>

                            <p>utilize <strong>APENAS</strong> arquivos salvos utilizando "Salvar como PDF" </p>



                                <div class="row m-5 py-8">
                                    <button type="button" onclick="window.location=' {{ route("pedidos.importar") }} '" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-yellow-300 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500" >
                                        Importar Pedidos
                                    </button>
                                </div>

                            <div class="row m-5 py-8">
                                <button type="button" onclick="window.location=' {{ route("pedidos.limpar") }} '" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500" >
                                    Apagar Pedidos
                                </button>
                            </div>

                            <!-- O tipo de encoding de dados, enctype, DEVE ser especificado abaixo -->
                            
                            
                            </form>

                        </div>

                        <br />

                    </div>
                </div>


                <!-- conteudo do corpo principal -->
            </div>
        </div>
    </div>


</x-app-layout>
