<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Получаем все отчеты из базы данных
        $reports = Report::paginate(10); // Используйте пагинацию для удобства
        
        // Возвращаем представление с отчетами
        return view('admin', compact('reports'));
    }

    public function update(Request $request, $id)
    {
        // Находим отчет по ID
        $report = Report::findOrFail($id);
        
        // Обновляем статус
        $report->status_id = $request->input('status_id');
        $report->save();

        // Перенаправляем обратно на страницу администрирования с сообщением об успехе
        return redirect()->route('admin.index')->with('success', 'Статус отчета обновлен успешно!');
    }
}
