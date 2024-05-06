<div class="w-full bg-white dark:bg-gray-800">
    <h5 class="mb-2 text-xl font-bold leading-none text-gray-900 dark:text-white">Solicitudes de amistad</h5>
    <div>
        @forelse($requests as $user)
            <div class="py-4 flex gap-3 items-center" wire:key="{{uniqid()}}">
                <img src="{{$user->profile_photo_url}}" alt="{{$user->name}}" class="w-24 h-24 rounded-full ">
                <div class="w-full flex flex-col gap-1">
                    <div class="flex justify-between">
                        <h3 class="text-lg text-white">{{$user->name}}</h3>
                        <h4 class="text-sm text-gray-400">2d</h4>
                    </div>
                    <div class="flex items-center mb-2 gap-1">
                        @php
                            $mutualFriends = \Illuminate\Support\Facades\Auth::user()->getMutualFriends($user);
                            $countMutualFriends = count($mutualFriends);
                        @endphp
                        <div class="flex gap-1 items-center">
                            <div class="flex -space-x-3 rtl:space-x-reverse" wire:key="{{uniqid()}}">
                                @foreach($mutualFriends as $mutualFriend)
                                    <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800"
                                         src="{{$mutualFriend->profile_photo_url}}" alt="{{$mutualFriend->name}}">
                                @endforeach
                            </div>
                            <p class="text-gray-500 text-xs">{{$countMutualFriends}}
                                amigo{{$countMutualFriends == 1 ? 's' : ''}} en común</p>
                        </div>
                    </div>
                    <div class="flex gap-2 w-full items-center justify-between">
                        <button
                            wire:click="acceptFriendRequest({{$user}})"
                            type="button"
                            class="flex-1 px-3 py-2 font-bold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Confirmar
                        </button>
                        <button
                            wire:click="rejectFriendRequest({{$user}})"
                            type="button"
                            class="flex-1 px-3 py-2 font-bold text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-gray-300 font-bold text-center my-2 text-xl">No hay solicitudes</h2>
        @endforelse
    </div>
</div>
