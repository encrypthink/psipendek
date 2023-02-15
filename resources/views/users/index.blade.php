<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
        <div class="mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
        @endif
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-7">
                <div class="grid grid-cols-2 mb-4">
                    <div class="mb-7">
                        <h1 class="text-slate-900 font-extrabold text-4xl sm:text-xl lg:text-4xl">Users</h1>
                    </div>
                    <div>
                        <div class="flex justify-end">
                            <a href="{{ route('users.create') }}" class="py-2 px-3 text-amber-900 font-bold rounded-md bg-yellow-400">Tambah Pengguna Baru</a>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-slate-100 rounded-md">
                    <table class="w-full whitespace-nowrap">
                        <thead class="font-bold border-b-2 border-yellow-400">
                            <tr>
                                <td class="px-5 py-3">No. Registrasi</td>
                                <td class="px-5 py-3">Name</td>
                                <td class="px-5 py-3">Email</td>
                                <td class="px-5 py-3">Role</td>
                                <td class="px-5 py-3">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) < 1)
                                <tr>
                                    <td colspan="3" class="p-4 text-center text-slate-500">Not yet record</td>
                                </tr>
                            @endif
                            @foreach ($users as $item)
                            <tr tabindex="0" class="focus:outline-none h-16 border-gray-100 hover:bg-yellow-100">
                                <td class="pl-5">
                                    {{ $item->registration_number }}
                                </td>
                                <td class="pl-5">
                                    {{ $item->name }}
                                </td>
                                <td class="pl-4">
                                    {{ $item->email }}
                                </td>
                                <td class="pl-4">
                                    <span class="p-1 text-white font-bold @if($item->role == "admin") bg-green-300 @else bg-yellow-400 @endif rounded-md">
                                        {{ $item->role }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex">
                                        <div class="mx-2 fill-slate-500 hover:fill-black text-slate-500 hover:text-black">
                                            <a href="{{ route('users.edit', $item->id) }}">
                                                <div class="flex flex-col place-items-center">
                                                    <svg width="20px" height="20px" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 48.7772 9.9766 L 50.4649 8.2422 C 51.2852 7.4219 51.2852 6.2734 50.4880 5.5000 L 49.9489 4.9375 C 49.2227 4.2109 48.0740 4.3047 47.3008 5.0547 L 45.5897 6.7422 Z M 21.8007 34.3516 L 26.3710 32.3594 L 47.0665 11.6875 L 43.8554 8.5234 L 23.1835 29.1953 L 21.0741 33.6016 C 20.8866 34.0000 21.3554 34.5391 21.8007 34.3516 Z M 12.0741 51.7891 L 39.5897 51.7891 C 43.8085 51.7891 46.2460 49.3516 46.2460 44.5234 L 46.2460 18.4375 L 42.4726 22.2109 L 42.4726 44.3360 C 42.4726 46.7734 41.1601 48.0156 39.5429 48.0156 L 12.1444 48.0156 C 9.8007 48.0156 8.4882 46.7734 8.4882 44.3360 L 8.4882 17.7344 C 8.4882 15.2969 9.8007 14.0312 12.1444 14.0312 L 32.4179 14.0312 L 36.1913 10.2578 L 12.0741 10.2578 C 7.1992 10.2578 4.7148 12.6953 4.7148 17.5234 L 4.7148 44.5234 C 4.7148 49.3750 7.1992 51.7891 12.0741 51.7891 Z"/></svg>
                                                    <p class="mt-1 font-semibold text-[9px]">edit</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mx-2 fill-slate-500 hover:fill-black text-slate-500 hover:text-black">
                                            <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit">
                                                    <div class="flex flex-col place-items-center">
                                                        <div>
                                                            <svg width="20px" height="20px" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 44.5235 48.6602 L 46.1407 14.3945 L 48.4844 14.3945 C 49.4454 14.3945 50.2187 13.5976 50.2187 12.6367 C 50.2187 11.6758 49.4454 10.8555 48.4844 10.8555 L 38.2422 10.8555 L 38.2422 7.3398 C 38.2422 3.9883 35.9688 1.8086 32.3595 1.8086 L 23.5938 1.8086 C 19.9844 1.8086 17.7344 3.9883 17.7344 7.3398 L 17.7344 10.8555 L 7.5391 10.8555 C 6.6016 10.8555 5.7813 11.6758 5.7813 12.6367 C 5.7813 13.5976 6.6016 14.3945 7.5391 14.3945 L 9.8829 14.3945 L 11.5000 48.6836 C 11.6641 52.0586 13.8907 54.1914 17.2657 54.1914 L 38.7579 54.1914 C 42.1095 54.1914 44.3595 52.0351 44.5235 48.6602 Z M 21.4844 7.5742 C 21.4844 6.2383 22.4688 5.3008 23.8751 5.3008 L 32.1016 5.3008 C 33.5313 5.3008 34.5157 6.2383 34.5157 7.5742 L 34.5157 10.8555 L 21.4844 10.8555 Z M 17.6173 50.6758 C 16.2579 50.6758 15.2500 49.6445 15.1797 48.2852 L 13.5391 14.3945 L 42.3907 14.3945 L 40.8438 48.2852 C 40.7735 49.6680 39.7891 50.6758 38.4063 50.6758 Z M 34.9610 46.5508 C 35.7344 46.5508 36.3204 45.9180 36.3438 45.0273 L 37.0469 20.2773 C 37.0704 19.3867 36.4610 18.7305 35.6641 18.7305 C 34.9376 18.7305 34.3282 19.4102 34.3048 20.2539 L 33.6016 45.0273 C 33.5782 45.8711 34.1641 46.5508 34.9610 46.5508 Z M 21.0626 46.5508 C 21.8595 46.5508 22.4454 45.8711 22.4219 45.0273 L 21.7188 20.2539 C 21.6954 19.4102 21.0626 18.7305 20.3360 18.7305 C 19.5391 18.7305 18.9532 19.3867 18.9766 20.2773 L 19.7032 45.0273 C 19.7266 45.9180 20.2891 46.5508 21.0626 46.5508 Z M 29.4298 45.0273 L 29.4298 20.2539 C 29.4298 19.4102 28.7969 18.7305 28.0235 18.7305 C 27.2500 18.7305 26.5938 19.4102 26.5938 20.2539 L 26.5938 45.0273 C 26.5938 45.8711 27.2500 46.5508 28.0235 46.5508 C 28.7735 46.5508 29.4298 45.8711 29.4298 45.0273 Z"/></svg>
                                                        </div>
                                                        <div>
                                                            <p class="mt-1 font-semibold text-[9px]">delete</p>
                                                        </div>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
