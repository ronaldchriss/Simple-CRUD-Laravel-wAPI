<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $data['view'] = $this->top();
        $data['location'] = $this->location();
        $data['user'] = $this->status();
        return view('menu.dashboard', compact('data'));

    }

    protected function top()
    {
        $top['view'] = Content::orderBy('view')->take(3)->get();
        $top['like'] = Content::orderBy('like')->take(3)->get();
        $top['dislike'] = Content::orderBy('dislike')->take(3)->get();
        return $top;
    }

    protected function location()
    {
        $user['province'] = User::select('province', DB::raw('COUNT(province) as count'))
                        ->groupBy('province')
                        ->orderBy('count', 'desc')
                        ->limit(3)->where('role', '!=' ,'admin')->get();
        $user['city'] = User::select('city', DB::raw('COUNT(city) as count'))
                        ->groupBy('city')
                        ->orderBy('count', 'desc')
                        ->limit(3)->where('role', '!=' ,'admin')->get();
        return $user;
    }

    protected function status()
    {
        $status['gender'] = DB::select("SELECT
                        COUNT(CASE WHEN gender = 'man' THEN 1 ELSE NULL END) AS man,
                        COUNT(CASE WHEN gender = 'woman' THEN 1 ELSE NULL END) AS woman
                        FROM users
                    ");
        $status['old'] = DB::select("SELECT
                    COUNT(CASE WHEN old BETWEEN 10 AND 15 THEN 1 ELSE NULL END) AS 'first',
                    COUNT(CASE WHEN old BETWEEN 15 AND 25 THEN 1 ELSE NULL END) AS second,
                    COUNT(CASE WHEN old > 25 THEN 1 ELSE NULL END) AS third
                    FROM users
                ");
        return $status;
    }
}
