<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Cita') }}
            </h2>
            <a href="{{ route('citas.create') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Agregar Cita
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
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Paciente</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Tratamiento</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Fecha</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Hora</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Costo</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-800">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-300 dark:divide-gray-600">
                            @foreach ($citas as $cita)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->cliente->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->tratamiento->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->fecha }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->hora }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $cita->costo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('citas.edit', $cita->id) }}" class="px-4 py-2 text-sm font-bold text-white bg-green-500 border border-green-700 rounded hover:bg-green-700">Editar</a>
                            
                                                                            <!-- Botón para mostrar el modal -->
                                        <button onclick="toggleModal('delete-modal-{{ $cita->id }}')" class="px-4 py-2 text-sm font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">
                                            Borrar
                                        </button>

                                        <!-- Modal de confirmación -->
                                        <div id="delete-modal-{{ $cita->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 overflow-auto bg-black bg-opacity-50">
                                            <div class="p-6 bg-white rounded-lg shadow-lg">
                                                <h2 class="mb-4 text-lg font-bold">Confirmar eliminación</h2>
                                                <p>¿Estás seguro de que deseas eliminar esta cita?</p>
                                                <div class="flex justify-end mt-6">
                                                    <button onclick="toggleModal('delete-modal-{{ $cita->id }}')" class="px-4 py-2 mr-2 text-sm font-bold text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Cancelar</button>
                                                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-red-500 border border-red-700 rounded hover:bg-red-700">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function toggleModal(modalId) {
                                                const modal = document.getElementById(modalId);
                                                if (modal) {
                                                    modal.classList.toggle('hidden');
                                                }
                                            }
                                        </script>
                                    </td> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
