<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cargas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div class="overflow-hidden bg-white shadow-xl">

                <div class="grid grid-cols-4">
                    <div class="col-span-2 p-10 max-h-96">
                        <div class="h-full overflow-auto rounded-md bg-rose-200">
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
                            <td class="px-4 py-2 font-medium border"> {{ $carga->idCarga }}</td>
                            <td class="px-4 py-2 font-medium border">{{ $carga->data }}</td>
                            <td class="px-4 py-2 font-medium border">{{ $carga->obs }}</td>
                            <td class="px-4 py-2 font-medium border">{{ $carga->destino }}</td>
                            <td class="px-4 py-2 font-medium border">{{ $carga->tbtransportadora_idTransportadora }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

                    <div class="col-span-2 p-10 ">

                        <div class="m-5 ">
                            <button type="button" onclick="window.location=' {{ route("cargas.form") }}'" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-gray-500 focus:outline-none focus:grey-500">
                                Nova carga
                            </button>
                        </div>

                        <div class="m-5 ">
                            <button type="button" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-gray-500 focus:outline-none focus:grey-500">
                                editar carga
                            </button>
                        </div>

                    </div>







                </div>



            </div>
        </div>
    </div>
</x-app-layout>
