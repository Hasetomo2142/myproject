<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- フォルダ作成へのリンクを追加 -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center">
                        <h3 class="mb-4">まずはフォルダを作成しましょう</h3>
                        <a href="{{ route('folders.create') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            フォルダ作成ページへ
                        </a>
                    </div>
                </div>
            </div>
            <!-- フォルダ作成へのリンクの追加終了 -->

        </div>
    </div>
</x-app-layout>