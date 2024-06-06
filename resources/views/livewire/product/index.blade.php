<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="min-w-fit flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="text-gray-500">Productos:</span>
                        <span class="dark:text-white">{{$total}}</span>
                    </h5>
                    <h5>
                        <span class="text-gray-500">Total ventas:</span>
                        <span class="dark:text-white">$88.4k</span>
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
                            placeholder="Buscar por nombre, codigo de barras o descripcion..."
                            wire:model.live="search"
                            required
                    />
                </div>
                <div
                        class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                    <a href="{{route('product.create')}}"
                       class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                        </svg>
                        Agregar producto
                    </a>

                    <button type="button"
                            class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                        Importar
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Producto</th>
                        <th scope="col" class="px-4 py-3">Categoria</th>
                        <th scope="col" class="px-4 py-3">Existencia/Tienda</th>
                        <th scope="col" class="px-4 py-3">Precio</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($productos as $producto)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row"
                                class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if($producto->foto)
                                    <img
                                            src="{{$producto->foto}}"
                                            alt="{{$producto->nombre}}" class="w-auto h-8 mr-3">
                                @endif
                                {{$producto->nombre}}
                            </th>
                            <td class="px-4 py-2">
                            <span
                                    class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                {{$producto->categoria? $producto->categoria->nombre : 'Sin categoria'}}
                            </span>
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <div @class([
                                        'inline-block w-4 h-4 mr-2 rounded-full',
                                        'bg-green-400' => $producto->stock_tienda >= 10,
                                        'bg-yellow-400' => $producto->stock_tienda < 10 && $producto->stock_tienda > 5,
                                        'bg-red-400' => $producto->stock_tienda <= 5 && $producto->stock_tienda > 2 ,
                                        'bg-red-700' => $producto->stock_tienda <= 2,
                                        ])
                                    ></div>
                                    {{$producto->stock_tienda}}
                                </div>
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                  $ {{$producto->precio}}
                            </td>
                            <td class="px-4 py-3 flex items-center ">
                                <a href="{{route('product.edit', $producto->id)}}"
                                   class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                >
                                    <x-untitledui-edit-04 class="w-5 h-5"/>
                                </a>
                                <button
                                        wire:click="confirmDelete({{$producto->id}})"
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
            {!! $productos->links() !!}
        </div>
    </div>

    @livewire('delete-modal', [
    'modalId' => 'deleteProductoModal',
    'action' => 'deleteProducto',
    'actionName' => 'Eliminar producto',
    'title' => 'Eliminar',
    'content' => '¿Está seguro de que desea eliminar este producto? <small>Esta acción es irreversible</small>',
    ])
</section>
