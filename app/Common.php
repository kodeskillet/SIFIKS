<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Common
{

    /**
     * Register new activity log
     *
     * @param $data
     * @return bool
     */
    public static function registerLog($data)
    {
        $log = new Log;

        $log->action = $data['action'];
        $log->target = $data['target'];
        $log->prefix = $data['prefix'];

        switch($data['target']) {
            case 'thread'   : $log->thread_id = $data['target_id']; break;
            case 'article'  : $log->article_id = $data['target_id']; break;
        }

        switch ($data['actor']) {
            case 'admin'    : $log->admin_id = $data['actor_id'];   break;
            case 'doctor'   : $log->doctor_id = $data['actor_id'];  break;
            case 'user'     : $log->user_id = $data['actor_id'];  break;
        }

        if($log->save()) {
            return true;
        }

        return false;
    }

    public static function unregisterLog($data)
    {
        $logs = Common::getLogs($data);
        $c = count($logs);
        $r = 0;
        foreach ($logs as $log) {
            if($log->delete()) {
                $r++;
            }
        }
        if($c == $r) {
            return true;
        }
        return false;
    }

    private static function getLogs($data)
    {
        $logs = null;
        if($data['target'] == 'thread') {
            $logs = Log::where('thread_id', $data['target_id'])->get();
        } elseif($data['target'] == 'article') {
            $logs = Log::where('article_id', $data['target_id'])->get();
        }
        return $logs;
    }

    /**
     * Get current logged in user
     *
     * @return mixed
     */
    public static function currentUser($guard)
    {
        return Auth::guard($guard)->user();
    }

}
