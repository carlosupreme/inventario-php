<x-dialog-modal wire:model="open">
    <x-slot name="title">
        <h2><strong>Ver ticket</strong></h2>
    </x-slot>
    <x-slot name="content">
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
                        <span>{{$producto->nombre}}</span>
                        <span>{{$producto->pivot->cantidad }}</span>
                        <span>${{$producto->precio}}</span>
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
        </div>
    </x-slot>
    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>
