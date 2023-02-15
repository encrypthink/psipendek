<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($question->exam->exam_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="mb-5 font-bold text-2xl">
                    {{ ($answer + 1) . ". " . $question->question }}
                </div>
                <form action="{{ route('answer', $question->exam->uuid) }}" method="post">
                    <div>
                        @foreach ($question->answers as $item)
                        <div class="flex items-center mb-4 px-3">
                            <input type="radio" name="answer" value="{{ $item->id }}" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option_2" aria-describedby="option_2" checked="">
                            <label class="text-xl font-semibold text-gray-900 ml-2 w-full block">
                            {{ $item->answer_text }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @csrf
                    <input type="hidden" name="question_uuid" value="{{ $question->uuid }}">
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-300 p-3 rounded-md hover:bg-yellow-300 font-bold">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
