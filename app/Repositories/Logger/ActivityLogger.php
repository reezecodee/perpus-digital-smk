<?php

namespace App\Repositories\Logger;

use App\Models\LogActivity;

class ActivityLogger
{
    public function saveLog($action)
    {
        $credentials = [
            'user_id' => auth()->user()->id,
            'keterangan' => $action
        ];
        LogActivity::create($credentials);
    }
}
