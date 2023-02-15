<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Ujian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h2 class="font-bold text-2xl mb-4">Daftar Ujian</h2>
                @foreach ($exam as $item)
                <a href="{{ route('results.show', $item->uuid) }}">
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
</x-app-layout>