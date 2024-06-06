<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="mx-auto max-w-screen-xl px-12 grid grid-cols-5">
        <div class="flex flex-col gap-4 col-span-2">
            <h1 class="text-3xl font-bold tracking-wide">Empezar a cobrar</h1>

            <div class="flex gap-2">
                <x-input wire:model.live="busqueda" name="busqueda" autofocus type="search"
                         placeholder="Escribe o escanea el codigo de barras"/>
                <x-button wire:click="buscar">Buscar</x-button>
            </div>

            @if($producto != null)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if($producto->foto)
                        <img class="p-8 rounded-t-lg" src="{{$producto->foto}}" alt="product image"/>
                    @endif
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$producto->nombre}}</h5>
                        <div class="flex items-center gap-2 mt-2.5 mb-5">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{$producto->categoria?->nombre}}</span>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">{{$producto->stock_tienda}} disponibles</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$producto->precio}}</span>
                            <div class="flex gap-4 items-center">
                                <label for="cantidad">X</label>
                                <input wire:model="cantidad" id="cantidad" type="number" class="w-16 h-10 text-center border border-gray-200 rounded-lg"/>
                            </div>

                            <button wire:click="agregarProducto"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <div class="col-span-1"></div>
        <div class="col-span-2 flex flex-col gap-2">
            <div
                class="flex bg-gray-300 rounded-lg flex-col items-center p-4 text-lg font-bold tracking-wider">
                <h2>Ticket</h2>
                <h3>Tienda de abarrotes</h3>
                <br>
                <div class="flex justify-between w-full">
                    <span>Producto</span>
                    <span>Cantidad</span>
                    <span>Precio</span>
                </div>
                @foreach($productos as $producto)
                    <div class="flex justify-between w-full">
                        <span>{{$producto[0]->nombre}}</span>
                        <span>{{$producto[1]}}</span>
                        <span>${{$producto[0]->precio}}</span>
                    </div>
                    <hr class="w-full border border-gray-400"/>
                @endforeach
                <br>
                <div class="flex justify-between w-full">
                    <span></span>
                    <span></span>
                    <span>Total: ${{$total}}</span>
                </div>
            </div>

            <x-button wire:click="cobrar" class="justify-center">Cobrar</x-button>
        </div>
    </div>
</section>
