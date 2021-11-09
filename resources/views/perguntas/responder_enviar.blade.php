 <!-- Componente app-layout que fica em app/View/Componensts/appLayout -->
 <!-- Esse componente redireciona para views/layouts/app.blade  -->
 <x-app-layout>


     <!-- Cabeçalho da pagina - que vai para layouts/app.blade na tag  $header  -->
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Envio') }}
         </h2>
     </x-slot>


     <!-- Corpo da pagina - que vai para layouts/app.blade na tag  $slot  -->
     <!-- A tag  $slot não foi definida aqui pois ela já é pre-definida -->
     <div class="py-12">
         <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <!-- conteudo do corpo principal -->

                 <h3 class="m-5">{{ $retornoEnviar }}</h3>

                 <div class="p-6 mx-20 ">
                     <button type="button" onclick="window.location='{{ route('perguntas.responder') }}'"
                         class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                         Voltar para Perguntas
                     </button>
                 </div>
                 <!-- fim do conteudo do corpo principal -->
             </div>
         </div>
     </div>


 </x-app-layout>
