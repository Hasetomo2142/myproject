<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダを一つ取得する
        $folder = $user->folders()->first();

        // まだ一つもフォルダを作っていなければホームページをレスポンスする
        if (is_null($folder)) {
            return view('dashboard');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }
}