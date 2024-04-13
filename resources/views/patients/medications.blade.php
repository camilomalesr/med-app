<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-xl cursor-pointer text-blue-800 leading-tight">
            <a href="/patients">
                <i class="fas fa-arrow-left"></i> Volver
            </a>            
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Medicamentos de {{ $patient->name }} {{$patient->lastname}}
        </h2>
        <div class="py-12">
            <a href="/add-medication-patient/{{$patient->id}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Agregar Medicamento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Medicamento</th>
                                <th class="px-4 py-2">Saldo actual</th>
                                <th class="px-4 py-2" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medications as $item)
                                <tr>
                                    <td>{{$item->medicament->name}}</td>
                                    <td>{{$item->current_amount}}</td>
                                    <td>
                                        <a 
                                            href="/flow-medication-patient/{{$item->id}}" 
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4"
                                        >Agregar Flujo</a></td>
                                    <td>
                                        <a 
                                            href="/history-flow-medicament/{{$item->id}}" 
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4"
                                        >Historial</a></td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
