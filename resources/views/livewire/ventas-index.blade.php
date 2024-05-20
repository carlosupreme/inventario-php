<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex px-4 py-3 gap-4 ">
                <h5 class="flex items-center space-x-4">
                    <span class="text-gray-500">Total ventas:</span>
                    <span class="dark:text-white">$ {{$total}}</span>
                </h5>
                <a href="{{route('ventas.create')}}"
                   class="flex items-center justify-center px-6 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    Cobrar
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Folio</th>
                        <th scope="col" class="px-4 py-3">Fecha</th>
                        <th scope="col" class="px-4 py-3">Hora</th>
                        <th scope="col" class="px-4 py-3">Trabajador</th>
                        <th scope="col" class="px-4 py-3">Total</th>
                        <th scope="col" class="px-4 py-3">Detalles</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tickets as $ticket)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row"
                                class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$ticket->id}}
                            </th>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$ticket->created_at->format('d/m/Y')}}
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$ticket->created_at->format('H:i:s')}}
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$ticket->user->name}}
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$ticket->total}}</td>
                            <td class="px-4 py-3 flex gap-3">
                                <a href="{{route('product.edit', $ticket->id)}}"
                                   class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                >
                                    <x-untitledui-edit-04 class="w-5 h-5"/>
                                </a>
                                <button
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
            {!! $tickets->links() !!}
        </div>
    </div>
</section>
