<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Ujian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h2 class="font-bold text-2xl mb-4">Daftar Peserta</h2>
                <table class="w-full whitespace-nowrap">
                    <thead class="font-bold border-b-2 border-yellow-400">
                        <tr>
                            <td class="px-5 py-3">No. Registrasi</td>
                            <td class="px-5 py-3">Name</td>
                            <td class="px-5 py-3">Hasil</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam->examinee as $item)
                        <tr tabindex="0" class="focus:outline-none h-16 border-gray-100 hover:bg-yellow-100">
                            <td class="pl-5">{{ $item->users->registration_number }}</td>
                            <td class="pl-5">{{ $item->users->name }}</td>
                            <td class="pl-5">
                                @php
                                $question = $item->exam->answer->count();
                                $answer = $item->exam->answer->where('value', 'correct')->count();
                                $result = "";
                                $total = ($answer / $question) * 100;
                                
                                if($total < 40 ) $result = "Buruk";
                                elseif ($total >= 40 && $total <= 60)  $result = "Cukup";
                                elseif ($total >= 60 && $total <= 80)  $result = "Baik";
                                else  $result = "Sangat Baik";
                                
                                @endphp
                                {{ $result }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>