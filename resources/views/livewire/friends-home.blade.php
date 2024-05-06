<div class="bg-white dark:bg-gray-800 flex flex-col gap-4 p-4">
    @livewire(\App\Livewire\SearchFriends::class)

    <div class="no-scrollbar w-full px-2 flex gap-2 items-center overflow-x-auto">
         <span wire:click="changeView('requests')"
                 @class([
                    "cursor-pointer text-lg font-medium px-4 py-2 rounded-full transition-colors duration-200",
                    "bg-blue-500 text-white" => $view === \App\Helpers\FriendsViews::requests,
                    "bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300" => $view !== \App\Helpers\FriendsViews::requests
                ])
             >Solicitudes</span>
        <span wire:click="changeView('suggestions')"
                     @class([
                        "cursor-pointer  text-lg font-medium px-4 py-2 rounded-full transition-colors duration-200",
                        "bg-blue-500 text-white" => $view == \App\Helpers\FriendsViews::suggestions,
                        "bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300" => $view !== \App\Helpers\FriendsViews::suggestions
                    ])
                 >Sugerencias</span>
        <span wire:click="changeView('friends')"
                 @class([
                    "flex-shrink-0 cursor-pointer  text-lg font-medium px-4 py-2 rounded-full transition-colors duration-200",
                    "bg-blue-500 text-white" => $view === \App\Helpers\FriendsViews::friends,
                    "bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300" => $view !== \App\Helpers\FriendsViews::friends
                ])
             >Tus amigos</span>
    </div>

    @switch($view)
        @case(\App\Helpers\FriendsViews::requests)
            @livewire(\App\Livewire\FriendRequests::class)
            @break

        @case(\App\Helpers\FriendsViews::suggestions)
            @livewire(\App\Livewire\FriendSuggestions::class)
            @break

        @case(\App\Helpers\FriendsViews::friends)
            @livewire(\App\Livewire\Friends::class)
            @break

    @endswitch
</div>

