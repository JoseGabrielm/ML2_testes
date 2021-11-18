<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cargas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl">

                <div class="grid grid-cols-4">
                    <div class="p-10 col-span-2 max-h-96">
                        <div class="overflow-auto h-full rounded-md bg-rose-200">
                        <table class="table-auto ">
                        <thead>
                            <tr>
                                <th>id carga</th>
                                <th>data</th>
                                <th>obs</th>
                                <th>destino</th>
                                <th>id transportadora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargas as $carga )
                            <tr>
                            <td class="border px-4 py-2 font-medium"> {{ $carga->idCarga }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $carga->data }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $carga->obs }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $carga->destino }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $carga->tbtransportadora_idTransportadora }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

                    <div class=" p-10 col-span-2">

                        <div class=" m-5 ">
                            <button type="submit" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-gray-500 focus:outline-none focus:grey-500">
                                Nova carga
                            </button>
                        </div>

                        <div class=" m-5 ">
                            <button type="submit" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-gray-500 focus:outline-none focus:grey-500">
                                editar carga
                            </button>
                        </div>

                    </div>







                </div>



            </div>
        </div>
    </div>
</x-app-layout>
