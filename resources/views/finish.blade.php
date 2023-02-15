<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selesai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 flex-col">
                <div class="flex justify-center">
                    <h2 class="font-bold text-4xl mb-4">Hasil Ujian Anda</h2>
                </div>
                <div class="flex justify-center">
                    <div>
                        <div>
                            @php
                            $result = "";
                            $total = ($answer / $question) * 100;
                            
                            if($total < 40 ) $result = "Buruk";
                            elseif ($total >= 40 && $total <= 60)  $result = "Cukup";
                            elseif ($total >= 60 && $total <= 80)  $result = "Baik";
                            else  $result = "Sangat Baik";
                            
                            @endphp
                            <h1 class="font-bold text-8xl text-center">{{ $result }}</h1>
                        </div>
                        <div>
                            <h3>Persentasi kebenaran {{ round($total) }}%, dengan jawaban benar {{ $answer }} pertanyaan dari {{ $question }} soal</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>