<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * タスク一覧
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function index(Folder $folder, Request $request)
    {
        // ユーザーのフォルダを取得する
        $folders = Auth::user()->folders()->get();

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $folder->tasks()->get();

        //リクエストから月日を取得する
        $month = $request->month;
        $year = $request->year;
        $today = date('j'); // 今日の日付を取得

        // 月の日数を取得
        $daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));

        // 各日のタスクを取得
        $tasksForDays = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {

            //フォーマットを整える
            $dateString = date('Y-m-') . str_pad($day, 2, '0', STR_PAD_LEFT);
            $tasksForDays[$day] = collect(); // 空のコレクションを初期化


            $tasksForDays[$day] = $tasksForDays[$day]->concat($folder->tasks()->where('due_date', $dateString)->get());

        }




        return view('tasks/index', [
            'daysInMonth' => $daysInMonth,
            'today' => $today,
            'tasksForDays' => $tasksForDays,
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク作成フォーム
     * @param Folder $folder
     * @return \Illuminate\View\View
     */
    public function showCreateForm(Folder $folder)
    {
        return view('tasks/create', [
            'folder_id' => $folder->id,
        ]);
    }

    /**
     * タスク作成
     * @param Folder $folder
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Folder $folder, CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }

    /**
     * タスク編集フォーム
     * @param Folder $folder
     * @param Task $task
     * @return \Illuminate\View\View
     */
    public function showEditForm(Folder $folder, Task $task)
    {
        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    /**
     * タスク編集
     * @param Folder $folder
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'folder' => $task->folder,
        ]);
    }
}