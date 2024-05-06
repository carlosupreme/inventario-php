<div class="mx-auto flex max-w-7xl flex-col gap-y-4 sm:mt-4 sm:px-6 lg:px-8">

    <div class="flex flex-col gap-4 px-4 sm:flex-row sm:items-center sm:justify-between sm:px-0">
        <h1 class="text-xl font-bold text-slate-800 dark:text-gray-200">Usuarios</h1>
        <label for="voice-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <x-untitledui-search-refraction class="w-4 h-4 text-gray-500 dark:text-gray-400"/>
            </div>
            <input
                type="text"
                id="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar por nombre, correo..."
                wire:model.live="search"
                required
            />
        </div>
        @livewire('user-create')
    </div>

    <div class="flex flex-col gap-4 px-4 sm:grid sm:grid-cols-2 sm:px-0 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($users as $user)
            <div
                @class([
                'group w-full rounded-lg border border-gray-200 bg-white shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700',
                'relative ' => Auth::id() === $user->id])>
                @if(Auth::id() === $user->id )
                    <div
                        class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-green-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                        Tú
                    </div>
                @endif
                <div class="flex flex-col items-center py-10">
                    <img class="mb-3 aspect-square h-24 w-24 rounded-full object-cover shadow-lg"
                         src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"/>
                    <a href="{{ route('user.show', $user) }}"
                       class="mb-1 text-xl font-medium text-gray-900 hover:underline dark:text-white">{{ $user->name }}</a>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                    <div class="mt-4 flex gap-x-3 md:mt-6">
                        <button wire:click="edit({{ $user->id }})"
                                class="inline-flex items-center rounded-lg bg-gray-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            <x-untitledui-user-edit class="w-4 h-4 mr-1 inline"/>
                            Editar
                        </button>
                        <button @disabled(Auth::id() === $user->id)
                                wire:click="confirmDelete({{ $user->id }})"
                                class="inline-flex items-center rounded-lg bg-rose-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-rose-800 focus:outline-none focus:ring-4 focus:ring-rose-300 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-rose-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                            <x-heroicon-s-trash class="w-4 h-4 mr-1 inline"/>
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @livewire('user-edit')

    @livewire('delete-modal', [
    'modalId' => 'deleteUserModal',
    'action' => 'deleteUser',
    'actionName' => 'Eliminar',
    'title' => 'Eliminar usuario',
    'content' => '¿Está seguro de que desea eliminar este usuario? <small>Esta acción es irreversible</small>',
    ])
</div>
