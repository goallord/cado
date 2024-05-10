<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\ApostolicWork;
use App\Models\Task;
use Illuminate\Http\Request;

class ApostolicWorkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $history = $user->tasks()->get();
        return view('member.apostolicHistory.index', compact('history'));
    }
    public function create()
    {
        return view('member.apostolicHistory.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'start_month' => 'required|string',
            'year' => 'required|string',
            'duration_in_words' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        $history = new Task();
        $history->start_month = $request->input('start_month');
        $history->year = $request->input('year');
        $history->location = $request->input('location');
        $history->duration_in_words = $request->input('duration_in_words');
        $history->user_id = auth()->user()->id;
        $history->status = 'disabled';
        $history->description = $request->input('description');
        $history->save();
        $notification = [
            'message'    => 'Assignment History Saved',
            'alert-type' => 'success',
        ];

        return redirect()->route('apostolic.history.view')->with($notification);
    }

    public function show($history)
    {
        $history = Task::with('user')->findOrFail($history);
        return view('member.apostolicHistory.show', compact('history'));
    }
    public function edit($history)
    {
        $history = Task::with('user')->findOrFail($history);
        return view('member.apostolicHistory.edit', compact('history'));
    }

    public function update(Request $request, $history)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'duration_in_words' => 'required|string',
            'organization' => 'required|string',
        ]);


        $history = Task::findOrFail($history);
        $history->start_month = $request->input('start_month');
        $history->year = $request->input('year');
        $history->location = $request->input('location');
        $history->duration_in_words = $request->input('duration_in_words');
        $history->user_id = auth()->user()->id;
        $history->status = 'disabled';
        $history->description = $request->input('description');
        $history->save();

        $notification = [
            'message'    => 'Assignment History Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    public function destroy($history)
    {
        $history = Task::findOrFail($history);

        $history->delete()  ;
             $notification = [
                 'message'    => 'Assignment History Deleted Successfully',
                 'alert-type' => 'success',
             ];

        return redirect()->route('apostolic.history.view')->with($notification);
    }
}
