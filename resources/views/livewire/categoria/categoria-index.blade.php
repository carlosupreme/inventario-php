<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="min-w-fit flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="text-gray-500">Categorias:</span>
                        <span class="dark:text-white">{{$total}}</span>
                    </h5>

                </div>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <x-untitledui-search-refraction class="w-4 h-4 text-gray-500 dark:text-gray-400"/>
                    </div>
                    <input
                        type="search"
                        id="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar categoria"
                        wire:model.live="search"
                        required
                    />
                </div>
                <div
                    class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">

                    @livewire('categoria.categoria-create')


                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Nombre</th>
                        <th scope="col" class="px-4 py-3">Fecha de creacion</th>
                        <th scope="col" class="px-4 py-3">Productos asociados</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categorias as $categoria)
                        <tr wire:key="{{ $categoria->id }} "
                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th
                                class="border-b border-[#eee] px-4 py-5 dark:border-strokedark"
                            >
                                <h5 class="font-medium text-black dark:text-white">{{$categoria->nombre}}</h5>
                                <p class="text-xs text-graydark dark:text-gray ">ID:{{$categoria->id}}</p>
                            </th>
                            <td class="border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                <p class="text-black dark:text-white flex items-center gap-2">
                                    <x-far-clock class="h-3 w-3"/>
                                    <span class="first-letter:uppercase">
                                    {{$categoria->created_at->diffForHumans()}}
                                    </span>
                                </p>
                            </td>
                            <td class="text-center border-b border-[#eee] px-4 py-5 dark:border-strokedark">
                                <p class="text-center text-black dark:text-white flex items-center gap-2">
                                    <x-fas-box class="h-3 w-3"/>
                                    {{$categoria->productos_count}}
                                </p>
                            </td>
                            <td class="px-4 py-5 flex items-center">
                                <button wire:click="edit({{ $categoria->id }})"
                                   class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                >
                                    <x-untitledui-edit-04 class="w-5 h-5"/>
                                </button>
                                <button
                                    wire:click="confirmDelete({{$categoria->id}})"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                >
                                    <x-untitledui-trash class="w-5 h-5"/>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $categorias->links() !!}
        </div>
    </div>

    @livewire('categoria.categoria-edit')

    @livewire('delete-modal', [
        'modalId' => 'deleteCategoriaModal',
        'action' => 'deleteCategoria',
        'actionName' => 'Eliminar',
        'title' => 'Eliminar categoria',
        'content' => '¿Está seguro de que desea eliminar esta categoria? <b>Esta acción es irreversible</b>',
        ])
</section>
