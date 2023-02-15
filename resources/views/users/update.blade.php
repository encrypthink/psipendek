<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Pengguna') }}
        </h2>
    </x-slot>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method("PUT")
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-7">
                    <div class="col-span-6 sm:col-span-3 mb-4">
                        <label for="registration_number" class="block text-sm font-medium text-gray-700">Nomor Registrasi</label>
                        <input type="text" name="registration_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $user->registration_number }}">
                        @error('registration_number')
                        <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-6 sm:col-span-3 mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $user->name }}">
                        @error('name')
                        <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-6 sm:col-span-3 mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-Mail</label>
                        <input type="text" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $user->email }}">
                        @error('email')
                        <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-6 sm:col-span-3 mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Role</label>
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="role">
                            <option>Select Role</option>
                            <option value="admin" @selected($user->role = "admin")>Admin</option>
                            <option value="participant" @selected($user->role = "participant")>Participant</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                        @error('role')
                        <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    @csrf
                    <div class="flex justify-end">
                        <button type="submit" class="py-2 px-3 text-amber-900 font-bold rounded-md bg-yellow-400">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>