<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-xl cursor-pointer text-blue-800 leading-tight">
            <a href="/patient/{{$patient->id}}/medications">
                <i class="fas fa-arrow-left"></i> Volver
            </a>            
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar medicamento para {{ $patient->name }} {{$patient->lastname}}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/save-medication-patient" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                        <input type="hidden" name="type" value="Add">
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Medicamento
                            </label>
                            <select name="medication_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                                <option value="">Seleccione un medicamento</option>
                                @foreach ($medications as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700" for="grid-first-name">
                                Cantidad
                            </label>
                            <input name="amount" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1" type="text" placeholder="0">
                        </div>
                        <div class="py-4">
                            <label class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                                Fecha
                            </label>
                            <input name="date" type="date">
                        </div>
                        <div class="py-6">
                            <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>