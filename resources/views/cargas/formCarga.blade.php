<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nova carga') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div class="overflow-hidden bg-white shadow-xl">

                <form class="w-full max-w-lg m-6" action="{{ route('cargas.cadastrar') }}" name="formCad" id="formCad" method="post">
                    @csrf
                    <div class="flex flex-wrap mb-6 -mx-3">


                      <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-first-name">
                          Destino
                        </label>
                        <input class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none form-control focus:outline-none focus:bg-white focus:border-gray-500" name="destinoCad" id="destinoCad" type="text" placeholder="">
                      </div>


                      <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-last-name">
                          Data de criação
                        </label>
                        <input class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none form-control focus:outline-none focus:bg-white focus:border-gray-500" name="dataCad" id="dataCad" type="date" placeholder="">
                      </div>
                    </div>


                    <div class="flex flex-wrap mb-2 -mx-2">

                        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                            <div class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                              <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-password">
                                Observações
                              </label>
                              <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none form-control focus:outline-none focus:bg-white focus:border-gray-500" name="obsCad" id="obsCad" type="text" placeholder="">

                            </div>
                          </div>


                      <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                          Transportadora
                        </label>
                        <div class="relative">
                          <select class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none form-control focus:outline-none focus:bg-white focus:border-gray-500" name="transCad" id="transCad">
                            <option value="1">Jadlog</option>
                            <option value="2">Fretado</option>
                          </select>

                        </div>
                      </div>

                    </div>


                    <div class="">
                        <button type="submit" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md form-control hover:bg-gray-500 focus:outline-none focus:grey-500">
                            Cadastrar
                        </button>
                        </div>






                  </form>





















            </div>
        </div>
    </div>


</x-app-layout>
