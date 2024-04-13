<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-xl cursor-pointer text-blue-800 leading-tight">
            <a href="/patients">
                <i class="fas fa-arrow-left"></i> Volver
            </a>            
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Paciente - {{$patient->name}} {{$patient->lastname}}
        </h2>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/update-patient" method="POST">
                        @csrf     
                        <input type="hidden" name="id" value="{{$patient->id}}">
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700" for="grid-first-name">
                                Indentificacion (C.C)
                            </label>
                            <input name="identification" value="{{$patient->identification}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1" type="text" placeholder="0">
                        </div>                    
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700" for="grid-first-name">
                                Nombre
                            </label>
                            <input name="name" value="{{$patient->name}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1" type="text" placeholder="0">
                        </div>     
                        <div class="py-4">
                            <label class="block font-medium text-sm text-gray-700" for="grid-first-name">
                                Apellido
                            </label>
                            <input name="lastname" value="{{$patient->lastname}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1" type="text" placeholder="0">
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