<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'label-danger'],
        2 => ['label' => '着手中', 'class' => 'label-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];
    const BACKGROUND_CLASSES = [
        1 => 'bg-red-200', // 未着手
        2 => 'bg-blue-200', // 着手中
        3 => 'bg-green-200' // 完了
    ];

    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (! isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (! isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }

    public function getStatusBackgroundClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];


        return self::BACKGROUND_CLASSES[$status] ?? '';
    }

    //所属を定義
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }


}