<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ujian') }}
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
                        <h1 class="text-slate-900 font-extrabold text-4xl sm:text-xl lg:text-4xl">Daftar Ujian</h1>
                    </div>
                    <div>
                        <div class="flex justify-end">
                            <a href="{{ route('exam.create') }}" class="py-2 px-3 text-amber-900 font-bold rounded-md bg-yellow-400">Buat Ujian Baru</a>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    @if (count($exam) < 1)
                    <div class="text-center text-gray-400 font-bold text-2xl">
                        Belum ada Ujian
                    </div>
                    @endif
                    @foreach ($exam as $item)
                    <a href="{{ route('exam.show', $item->uuid) }}">
                        <div class="rounded-lg bg-yellow-50 font-bold p-5 shadow-sm grid grid-cols-2 hover:bg-yellow-400">
                            <div class="flex justify-start">
                                <div>
                                    <div>
                                        <span class="text-xl">{{ $item->exam_name }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">{{ count($item->question) }} Soal</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <div class="text-center">
                                    <div>{{ count($item->examinee) }}</div>
                                    <div>Peserta</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
