<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth; // Импортируйте фасад Auth

class ReportController extends Controller
{
    public function index()
    {
        // Получаем отчеты только для текущего пользователя
        $reports = Report::where('user_id', Auth::id())->paginate(10);
        
        return view('report.index', ['reports' => $reports]);
    }
    public function create() {
        return view('report.create');
    }
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
    public function update(Request $request) {
        $request->validate([
            'status_id' => ['required'],
            'id' => ['required']
        ]);
        Report::where('id', $request->id)->update([
            'status_id' => $request->status_id,
        ]);
        return redirect()->back();
    }

    public function show(Report $report)
    {     
        return view('report.edit', compact('report'));
    }
}
