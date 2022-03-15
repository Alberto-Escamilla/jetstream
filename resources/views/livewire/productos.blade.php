<x-slot name="header">
    <h1 class="text-gray-900">Crud con Laravel 8 y Livewire</h1>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        {{-- FLASH MESSAGES --}}
        @if (session()->has('message'))
        <div class="alert alert-success">
            <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                <span class="font-medium"></span> {{ session('message') }}
              </div>
            {{-- {{ session('message') }} --}}
        </div>
    @endif
        {{-- CON EL ELEMENTO WIRE:CLICK MANDAMOS A LLAMAR LA FUNCIÓN PARA EL MODAL --}}
        <button wire:click="crear" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Nuevo</button>
        @if ($modal)
        {{-- aqui mandamos a llamar el modal con la condicion if  --}}
        @include('livewire.crear')
        @endif

        <table class="table-fixed w-full">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">DESCRIPCION</th>
                <th class="px-4 py-2">CANTIDAD</th>
                <th class="px-4 py-2">ACCIONES</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td class="border px-4 py-2">{{$producto->id}}</td>
                    <td class="border px-4 py-2">{{$producto->descripcion}}</td>
                    <td class="border px-4 py-2">{{$producto->cantidad}}</td>

                    <td class="border px-4 py-2">
                        <button wire:click="editar({{$producto->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$producto->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
