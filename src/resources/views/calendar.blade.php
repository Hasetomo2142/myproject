<!-- カレンダーコンポーネントのメインコンテナ -->
<div class="bg-white shadow-md rounded-md w-4/5 mx-auto">
    <!-- カレンダーのヘッダー部分 -->
    <div class="bg-gray-200 p-4 flex justify-between">
        カレンダー
    </div>
    <!-- カレンダーの本体部分 -->
    <div class="p-4">
        <div class="grid grid-cols-7 gap-4">
            <!-- 月の日数分ループして日付を表示 -->
            @for ($day = 1; $day <= $daysInMonth; $day++) <!-- その日のタスクを取得 -->
                @php
                $tasksForTheDay = $tasksForDays[$day];
                @endphp
                <div class="p-2 relative">
                    <!-- 今日の日付の場合、背景に青色の丸を表示 -->
                    <div
                        class="z-10 relative text-center {{ $today == $day ? 'bg-blue-500 text-white rounded-full w-6 h-6 mx-auto' : '' }}">
                        {{ $day }}
                    </div>
                    <!-- その日のタスクを表示 -->
                    @foreach($tasksForTheDay as $taskForTheDay)
                    <div class="{{ $taskForTheDay->status_background_class }} mt-1 p-1 rounded">
                        <!-- タスクが完了している場合、タイトルに取り消し線を表示 -->
                        <a href="{{ route('tasks.edit', ['folder' => $taskForTheDay->folder_id, 'task' => $taskForTheDay->id]) }}"
                            class="text-xs {{ $taskForTheDay->status == 3 ? 'line-through' : '' }}">
                            {{ $taskForTheDay->title }}
                        </a>
                    </div>
                    @endforeach
                </div>
                @endfor
        </div>
    </div>
</div>