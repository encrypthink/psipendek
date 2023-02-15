<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Ujian') }}
        </h2>
    </x-slot>

    <div class="py-10">
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

        <div class="flex gap-3 px-5">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-7 w-3/4">
                <div class="grid grid-cols-2 mb-2">
                    <div>
                        <h1 class="text-slate-900 font-extrabold text-2xl sm:text-xl lg:text-2xl mb-3">Soal Ujian</h1>
                    </div>
                    <div class="flex justify-end">
                        <button class="py-1 px-3 text-amber-900 font-bold rounded-md bg-yellow-400" onclick="createQuestion()">Buat Soal</button>
                    </div>
                </div>
                <hr>
                <div class="py-4 hidden" id="question">
                    <form action="{{ route('question.store') }}" method="post">
                        @csrf
                        <div class="col-span-6 sm:col-span-3 mb-4">
                            <label for="question" class="block text-sm font-medium font-bold text-gray-700">Pertanyaan</label>
                            <input type="text" name="question" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('question')
                            <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                            @enderror
                            <div class="mt-3">
                                <label for="question" class="block text-sm font-medium font-bold text-gray-700">Jawaban</label>
                            </div>
                            <div class="grid grid-cols-2 mt-3">
                                <div class="flex items-center mb-4 px-3">
                                    <input id="option_1" type="radio" name="is_answer" value="option_1" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option_1" aria-describedby="option_1" checked="">
                                    <label for="option_1" class="text-sm font-medium text-gray-900 ml-2 w-full block">
                                    <input type="text" name="option_1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </label>
                                    @error('option_1')
                                    <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex items-center mb-4 px-3">
                                    <input id="option_2" type="radio" name="is_answer" value="option_2" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option_2" aria-describedby="option_2" checked="">
                                    <label for="option_2" class="text-sm font-medium text-gray-900 ml-2 w-full block">
                                    <input type="text" name="option_2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </label>
                                    @error('option_2')
                                    <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex items-center mb-4 px-3">
                                    <input id="option_3" type="radio" name="is_answer" value="option_3" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option_3" aria-describedby="option_3" checked="">
                                    <label for="option_3" class="text-sm font-medium text-gray-900 ml-2 w-full block">
                                    <input type="text" name="option_3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </label>
                                    @error('option_3')
                                    <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex items-center mb-4 px-3">
                                    <input id="option_4" type="radio" name="is_answer" value="option_4" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option_4" aria-describedby="option_4" checked="">
                                    <label for="option_4" class="text-sm font-medium text-gray-900 ml-2 w-full block">
                                    <input type="text" name="option_4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </label>
                                    @error('option_4')
                                    <p class="text-red-400 text-xs italic my-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="exam_uuid" value="{{ $exam->uuid }}">
                        <div class="flex justify-end mb-2">
                            <button type="submit" class="py-1 px-3 text-amber-900 font-bold rounded-md bg-yellow-400">Simpan</button>
                        </div>
                    </form>
                    <hr>
                </div>
                @if (count($questions) < 1)
                <div class="text-center text-gray-400 font-bold text-2xl">
                    Belum ada Soal
                </div>
                @endif
                @php
                    $i = 1;
                @endphp
                @foreach ($questions as $item)
                <div class="mt-3 mb-8">
                    <h3 class="font-bold text-xl">{{ $i . ". " . $item->question }}</h3>
                    <div class="mt-2 mb-8 grid grid-cols-2">
                        @foreach ($item->answers as $item)
                        <div class="p-3 @if($item->is_answer == "yes") bg-green-300 @endif">
                            <span>{{ $item->answer_text }}</span>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                </div>
                @php
                $i++;
                @endphp
                @endforeach
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-7 w-1/4">
                <h1 class="text-slate-900 font-extrabold text-2xl sm:text-xl lg:text-2xl mb-3">Peserta Ujian</h1>
                <hr>
                <form action="{{ route("examinee.store") }}" method="post" class="my-3">
                    @csrf
                    <select name="users_id" id="" class="w-full">
                        <option value="">- Pilih Peserta -</option>
                        @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->registration_number . " - ". $item->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="exam_uuid" value="{{ $exam->uuid }}">
                    <div class="my-2">
                        <button type="submit" class="py-1 px-3 text-amber-900 font-bold rounded-md bg-yellow-400 w-full">Tambah</button>
                    </div>
                </form>
                <div class="my-3">
                    @if (count($participant) < 1)
                    <div class="text-center text-gray-400 font-bold text-2xl">
                        Belum ada Peserta
                    </div>
                    @endif

                    <ul>
                        @foreach ($participant as $item)
                        <li>{{ $item->users->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>