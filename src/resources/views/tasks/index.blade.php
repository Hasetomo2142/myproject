<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-wrap">

                    <div class="w-full md:w-2/3 px-4 mb-4" style="width: 100%;">
                        @include('calendar', ['tasks' => $tasks, 'month' => request()->get('month', date('m')), 'year'
                        => request()->get('year', date('Y'))])
                    </div>




                    <div class="w-full md:w-1/3 px-4">
                        <div class="bg-white shadow-md rounded-md">
                            <div class="bg-gray-200 p-4">フォルダ</div>
                            <div class="p-4">
                                <a href="{{ route('folders.create') }}"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center w-full text-center">
                                    フォルダを追加する
                                </a>
                            </div>
                            <div class="list-group">
                                @foreach($folders as $folder)
                                <a href="{{ route('tasks.index', ['folder' => $folder->id]) }}"
                                    class="block py-2 px-4 hover:bg-gray-200 {{ $current_folder_id === $folder->id ? 'bg-blue-500 text-white' : 'text-black' }}">
                                    {{ $folder->title }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 px-4">
                        <div class="bg-white shadow-md rounded-md">
                            <div class="bg-gray-200 p-4">タスク</div>
                            <div class="p-4">
                                <div class="text-right">
                                    <a href="{{ route('tasks.create', ['folder' => $current_folder_id]) }}"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center w-full text-center">
                                        タスクを追加する
                                    </a>
                                </div>
                            </div>
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200">タイトル</th>
                                        <th class="py-2 px-4 border-b border-gray-200">状態</th>
                                        <th class="py-2 px-4 border-b border-gray-200">期限</th>
                                        <th class="py-2 px-4 border-b border-gray-200"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $task->title }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <span class="label {{ $task->status_class }}">{{ $task->status_label
                                                }}</span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $task->formatted_due_date }}
                                        </td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <a href="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}"
                                                class="text-blue-500 hover:text-blue-800">
                                                編集
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>