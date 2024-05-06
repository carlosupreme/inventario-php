<div class="w-full bg-white dark:bg-gray-800">
    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Tus amigos</h5>
    <div class="my-4">
        <label for="default-search"
               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live="search"
                type="search" id="default-search"
                   class="w-full p-4 ps-12 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                   placeholder="Buscar amigos..." required/>
        </div>
    </div>
    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{$countFriends}}
        amigo{{$countFriends > 1 ? 's' : ''}}</h5>
    <div>
        @forelse($friends as $user)
            <div class="py-4 flex gap-3 items-center" wire:key="{{uniqid()}}">
                <img src="{{$user->profile_photo_url}}" alt="{{$user->name}}" class="w-16 h-16 rounded-full ">
                <div class="w-full flex flex-col gap-1">
                    <h3 class="text-white">{{$user->name}}</h3>
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
                                amigo{{$countMutualFriends > 1 ? 's' : ''}} en común</p>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <h2 class="text-gray-300 font-bold text-center my-2 text-xl">Aun no tienes amigos</h2>
        @endforelse
    </div>
</div>
