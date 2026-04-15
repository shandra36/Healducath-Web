<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // TAMPILKAN SEMUA TASK USER
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    // SIMPAN TASK BARU
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'deadline' => 'required|date'
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'is_completed' => false
        ]);

        return redirect()->back()->with('success', 'Task berhasil ditambahkan');
    }

    // TANDAI SELESAI
    public function complete($id)
    {
        Task::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['is_completed' => true]);

        return back();
    }

    // HAPUS TASK
    public function destroy($id)
    {
        Task::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back();
    }

public function start($id)
{
    $task = Task::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    // 🔥 INI DIA LETAKNYA
$task->update([
    'status' => 'completed',
    'is_completed' => true
]);
    return redirect('/focus/' . $task->id);
}
}