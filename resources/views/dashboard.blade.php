<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Auth::user()->role == "participant")
                <div class="p-5">
                    <div class="py-3 font-bold mb-4">
                        <table class="mb-4">
                            <tr>
                                <td>Nama Peserta</td>
                                <td>: {{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Registrasi &nbsp;</td>
                                <td>: {{ Auth::user()->registration_number}}</td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    @if (count($examinee) < 1)
                    <div class="text-center text-gray-400 font-bold text-2xl">
                        Belum ada Ujian
                    </div>
                    @endif
                    @foreach ($examinee as $item)
                    <div class="rounded-lg border-2 font-bold p-5 shadow-sm grid grid-cols-2">
                        <div class="flex justify-start">
                            <span>{{ $item->exam->exam_name }}</span>
                        </div>
                        <div class="flex justify-end">
                            @if ($item->already_done == "no" && $item->exam->available == "true")
                            <a href="{{ route('sheet', $item->exam_uuid) }}" class="bg-blue-300 px-2 py-1 rounded-md hover:bg-yellow-300">Mulai Kerjakan</a>
                            @elseif ($item->already_done == "no" && $item->exam->available == "false")
                            Ujian Belum Tersedia
                            @elseif($item->already_done == "yes")
                            <a href="{{ route('sheet', $item->exam_uuid) }}" class="bg-blue-300 px-2 py-1 rounded-md hover:bg-yellow-300">Lihat Hasil</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
