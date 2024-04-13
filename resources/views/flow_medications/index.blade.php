<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-xl cursor-pointer text-blue-800 leading-tight">
            <a href="{{ url()->previous() }}">
                <i class="fas fa-arrow-left"></i> Volver
            </a>            
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Historial
        </h2>        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$medicationsPatient->patient->name}} - {{$medicationsPatient->medicament->name}} ({{$medicationsPatient->current_amount}})
         </h2>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2">Cantidad</th>
                                <th class="px-4 py-2">Entrada/Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                                <tr>
                                    <td>{{$item->date}}</td>
                                    <td class="text-right">{{$item->amount}}</td>                                    
                                    <td class="text-right">{{$item->type == 'Add' ? 'Entrada' : 'Salida'}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
