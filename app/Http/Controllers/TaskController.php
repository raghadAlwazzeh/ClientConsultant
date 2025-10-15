<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Calendar;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /*public function index($year = null, $month = null, Client $client)
    {
        if ($year && $month) {
            $date = Carbon::createFromDate($year, $month, 1);
        } else {
            $date = Carbon::now();
        }
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
    
        $events = Calendar::with(['client', 'consultant'])
                    ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
                    ->get()
                    ->groupBy(fn($event) => Carbon::parse($event->start_time)->toDateString());
        
        return view('calendar', [
            'events' => $events,
            'date' => $date,
            'startOfMonth' => $startOfMonth,
            'endOfMonth' => $endOfMonth,
        ]);
    }*/
    public function index( Client $client,$year = null ,$month = null)
    {
        if ($year && $month) {
            $date = Carbon::createFromDate($year, $month, 1);
        } else {
            $date = Carbon::now();
        }
        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth();
        $events=$client->calendars()
        ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
        ->get()
        ->groupBy(fn($event) => Carbon::parse($event->start_time)->toDateString());
        /*$events = Calendar::with(['client', 'consultant'])
                    ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
                    ->where('client_id', $client)
                    ->get()
                    ->groupBy(fn($event) => Carbon::parse($event->start_time)->toDateString());*/
       //return($events);
       
       
        return view('calendar', [
            'client' => $client,
            'events' => $events,
            'date' => $date,
            'startOfMonth' => $startOfMonth,
            'endOfMonth' => $endOfMonth,
            
        ]);
    }

    public function store(Request $request)
    {
        
        //return ($request);
        // دمج التاريخ مع الوقت
        $start = Carbon::parse($request->start_time . ' ' . $request->start_hour);
        $end = Carbon::parse($request->start_time . ' ' . $request->end_hour);

        Calendar::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $start,
            'end_time' => $end,
            'client_id' => $request->client_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'تم إضافة الحدث بنجاح');
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return redirect()->back()->with('success', 'تم حذف الحدث');
    }

    public function addTask(Client $client){
        return view('task', compact('client'));
    }

    public function storeTask(Client $client, Request $request){
        Task::create([
            'submission_date'=> $request->submission_date,
            'title' => $request->title,
            'task_description' => $request->description,
            'deadline' => $request->deadline,
            'client_id' => $client->id,
            'user_id' => Auth::id(),
        ]);
       return redirect('/task/show/' .$client->id);
    }

    public function showTask(Client $client){
        
        return view('showTasks', compact('client'));
    }
    public function showTaskDetails(Task $task){
        
        return view('taskDetails', compact('task'));
    }
    public function toggleStatus(Task $task){
        $task->is_done = !$task->is_done;
        $task->save();
        return redirect()->back();
    }
    
}


