<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Agregar un nuevo producto</h2>
                    <form wire:submit="save">

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            <div class="sm:col-span-2">
                                <label for="name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                    del producto</label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    type="text"
                                    wire:model.blur="form.nombre"
                                    name="name"
                                    id="name"
                                    placeholder="Coca cola"
                                    required
                                />
                                <x-input-error for="form.nombre"/>
                            </div>

                            <div class="w-full">
                                <label for="barcode"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código de
                                    barras</label>
                                <input type="text"
                                       name="barcode"
                                       id="barcode"
                                       wire:model.blur="form.codigo_barras"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                       placeholder="000000000000" required="">
                                <x-input-error for="form.codigo_barras"/>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div class="w-full flex items-center justify-between gap-4">
                                    <div>
                                        <label for="costo"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Costo</label>
                                        <input type="number" name="costo" id="costo"
                                               wire:model.blur="form.costo"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="$2999" required="">

                                    </div>
                                    <div>
                                        <label for="price"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                                        <input type="number" name="price" id="price"
                                               wire:model.blur="form.precio"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="$2999" required="">
                                    </div>
                                    <div>
                                        <label for="price_mayoreo"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                                            de mayoreo</label>
                                        <input type="number" name="price_mayoreo" id="price_mayoreo"
                                               wire:model.blur="form.precio_mayoreo"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="$2999" required="">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <x-input-error for="form.costo"/>
                                    <x-input-error for="form.precio"/>
                                    <x-input-error for="form.precio_mayoreo"/>
                                </div>
                            </div>

                            <div>
                                <label for="category"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                                <select id="category"
                                        wire:model.blur="form.categoria_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" selected>Selecciona una categoria</option>
                                    @foreach($categoriesOptions as $categoria)
                                        <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="form.categoria_id"/>
                            </div>

                            <div class="flex flex-col gap-4">
                                <div class="w-full flex items-center justify-between gap-4">
                                    <div>
                                        <label for="stock_minimo"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Existencia
                                            minima</label>
                                        <input type="number" name="stock_minimo" id="price"
                                               wire:model.blur="form.stock_minimo"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="25">
                                    </div>
                                    <div>
                                        <label for="stock_tienda"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Existencia
                                            en tienda</label>
                                        <input type="number" name="stock_tienda" id="stock_tienda"
                                               wire:model.blur="form.stock_tienda"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="100">
                                    </div>
                                    <div>
                                        <label for="stock_bodega"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Existencia
                                            en bodega</label>
                                        <input type="number" name="stock_bodega" id="stock_bodega"
                                               wire:model.blur="form.stock_bodega"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                               placeholder="1000">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <x-input-error for="form.stock_minimo"/>
                                    <x-input-error for="form.stock_tienda"/>
                                    <x-input-error for="form.stock_bodega"/>
                                </div>
                            </div>

                            <div>
                                <label for="unidad"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidad de
                                    medida</label>
                                <input type="text" name="unidad" id="unidad"
                                       wire:model.blur="form.unidad_medida"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                       placeholder="kilogramo" >
                                <x-input-error for="form.unidad_medida"/>
                            </div>
                            <div>
                                <label for="cantidad_mayoreo"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad
                                    para considerarse mayoreo</label>
                                <input type="number" name="cantidad_mayoreo" id="cantidad_mayoreo"
                                       wire:model.blur="form.cantidad_mayoreo"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                       placeholder="10"  >
                                <x-input-error for="form.cantidad_mayoreo"/>
                            </div>
                            <div>
                                <label for="description"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                                <textarea id="description" rows="8"
                                          wire:model.blur="form.descripcion"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                          placeholder="Escribe detalles del producto"></textarea>
                                <x-input-error for="form.descripcion"/>
                            </div>


                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                       for="file_input">Subir foto</label>

                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       aria-describedby="file_input_help"
                                       id="file_input"
                                       type="file"
                                       wire:model.live="form.foto"
                                       accept="iamge/*"
                                >
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

                                <x-input-error for="form.foto"/>

                                @if ($form->foto)
                                    <img src="{{ $form->foto->temporaryUrl() }}" alt="Foto del producto"
                                         class="mt-2 w-20 h-20 object-cover rounded-lg">
                                @endif
                            </div>

                        </div>
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Agregar producto
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>
