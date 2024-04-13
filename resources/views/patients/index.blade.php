<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modulo Pacientes') }}            
        </h2>
        <div class="py-6">
            <a href="/form-patient" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Crear Paciente
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-6">
                        <form action="/patients" method="GET">
                            <input value="{{ request()->input('search') }}" type="text" name="search" placeholder="Id, nombre o apellido">
                            <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                Buscar
                            </button>
                        </form>
                    </div>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Identificacion</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Apellido</th>
                                <th class="px-4 py-2" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $item)
                                <tr>
                                    <td class="">{{$item->identification}}</td>
                                    <td class="">{{$item->name}}</td>
                                    <td class="">{{$item->lastname}}</td>
                                    <td class="">
                                        <a href="/patient/{{$item->id}}/medications" 
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                                            Medicamentos
                                        </a>
                                    </td>
                                    <td class="">
                                        <a href="/patient/{{$item->id}}/edit" 
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="">
                                        <form id="deleteForm{{$item->id}}" action="/patient/delete" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="button"
                                                onclick="confirmDelete({{$item->id}})"
                                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                                                Eliminar
                                            </button>
                                        </form>
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
<script>
    function confirmDelete(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>