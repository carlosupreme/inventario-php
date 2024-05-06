<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div
                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="text-gray-500">Productos:</span>
                        <span class="dark:text-white">{{$total}}</span>
                    </h5>
                    <h5>
                        <span class="text-gray-500">Total ventas:</span>
                        <span class="dark:text-white">$88.4k</span>
                    </h5>
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
                        Exportar
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
                        <th scope="col" class="px-4 py-3">Existencia/Bodega</th>
                        <th scope="col" class="px-4 py-3">Ventas/Dia</th>
                        <th scope="col" class="px-4 py-3">Ventas/Mes</th>
                        <th scope="col" class="px-4 py-3">Ventas</th>
                        <th scope="col" class="px-4 py-3">Ganancia</th>
                        <th scope="col" class="px-4 py-3">Ultima modif.</th>
                        <th scope="col" class="px-4 py-3"></th>
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
                                {{$producto->categoria->nombre}}
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
                                <div class="flex items-center">
                                    <div @class([
                                        'inline-block w-4 h-4 mr-2 rounded-full',
                                        'bg-green-400' => $producto->stock_bodega >= 10,
                                        'bg-yellow-400' => $producto->stock_bodega < 10 && $producto->stock_bodega > 5,
                                        'bg-red-400' => $producto->stock_bodega <= 5 && $producto->stock_bodega > 2,
                                        'bg-red-700' => $producto->stock_bodega <= 2,
                                        ])
                                    ></div>
                                    {{$producto->stock_bodega}}
                                </div>
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">1.47</td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">0.47</td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                         class="w-5 h-5 mr-2 text-gray-400" aria-hidden="true">
                                        <path
                                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"/>
                                    </svg>
                                    1.6M
                                </div>
                            </td>
                            <td class="px-4 py-2">$3.2M</td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$producto->updated_at->diffForHumans()}}</td>
                            <td class="px-4 py-3 flex items-center justify-center">
                                <a href="{{route('product.edit', $producto->id)}}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                   >
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

            <nav
                class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                  Showing
                  <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                  of
                  <span class="font-semibold text-gray-900 dark:text-white">1000</span>
              </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#"
                           class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                           class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
