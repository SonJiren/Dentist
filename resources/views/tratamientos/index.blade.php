<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Tratamientos') }}
            </h2>
            <a href="{{ route('tratamientos.create') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Agregar Tratamiento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 dark:bg-gray-300 dark:border-gray-600">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-400">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">ID</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Tratamientos</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Descripción</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Costo</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-300 dark:divide-gray-600">
                            @foreach ($tratamientos as $tratamiento)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $tratamiento->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $tratamiento->tratamiento }}</td>
                                    <td class="px-6 py-4 break-words whitespace-normal">{{ $tratamiento->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $tratamiento->costo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('tratamientos.edit', $tratamiento->id) }}" class="px-4 py-2 text-sm font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700">Editar</a>
                                        <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">Borrar</button>
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
