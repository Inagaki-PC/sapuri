<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Holiday;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getHoliday(Request $request)
    {
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::where('user_id', Auth::id())->get();
        //$list = Holiday::all();
        
        return view('calendar.holiday', ['list' => $list,'data' => $data]);
    }
    
    public function getHolidayId($id)
    {
        // 休日データ取得
        $data = new Holiday();
        if (isset($id)) {
            $data = Holiday::where('id', '=', $id)->first();
        } 
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }
    
    public function postHoliday(Request $request)
    {
        $validatedData = $request->validate([
            'day' => 'required|date_format:Y-m-d',
            'description' => 'required',
        ]);
        // POSTで受信した休日データの登録
        if (isset($request->id)) {
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->user_id = Auth::id();
            $holiday->day = $request->day;
            $holiday->description = $request->description;
            $holiday->save();
            \Session::flash('update_message', '更新しました！');
        } else {
            $holiday = new Holiday(); 
            $holiday->user_id = Auth::id();
            $holiday->day = $request->day;
            $holiday->description = $request->description;
            $holiday->save();
            \Session::flash('new_message', '新規登録しました！');
        }
        
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return redirect('/holiday');
    }
    
    public function index(Request $request)
    {
        //$list = Holiday::all();
        $list = Holiday::where('user_id', Auth::id())->get();
        $cal = new Calendar($list);
        $tag = $cal->showCalendarTag($request->month,$request->year);
        return view('calendar.index', ['cal_tag' => $tag]);
    }
    
    public function deleteHoliday(Request $request)
    {
        // DELETEで受信した休日データの削除
        if (isset($request->id)) {
            $holiday = Holiday::where('id', '=', $request->id)->first();        
            $holiday->delete();
        }
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        \Session::flash('delete_message', '削除が完了しました！');
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }
}
