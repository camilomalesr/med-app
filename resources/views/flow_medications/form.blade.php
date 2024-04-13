<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-xl cursor-pointer text-blue-800 leading-tight">
            <a href="{{ url()->previous() }}">
                <i class="fas fa-arrow-left"></i> Volver
            </a>            
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Flujo medicamento
        </h2>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/save-flow-medication" method="POST">
                        @csrf
                        <input type="hidden" name="medications_patients_id" value="{{$medicationPatient->id}}">
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
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Tipo
                            </label>
                            <select name="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                                <option value="">Seleccione una opcion</option>
                                <option value="Add">Entrada</option>
                                <option value="Less">Salida</option>
                            </select>
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