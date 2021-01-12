<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacation;
use App\Http\Requests\VacationController\Update;
use App\Http\Requests\VacationController\Store;

class VacationController extends Controller
{

    /**
     * Список отпусков работников
     * 
     * 
     */
    public function index()
    {
        $role = auth()->user()->roles()->first();
        $data = [];
        switch ($role->name)
        {
            case 'employer':
                $data['my_vacations'] = Vacation::myVacations()->get();
                $data['vacations'] = Vacation::vacationsOtherUsers()->paginate($request->qty ?? 20);
                break;

            case 'leader':
                $data['vacations'] = Vacation::paginate($request->qty ?? 20);
                break;
        }

        return view('vacations.index', compact('data'));
    }

    public function create()
    {
        return view('vacations.create');
    }

    /**
     * Задать отпуск
     * 
     */
    public function store(Store $request)
    {
        $vacation = auth()->user()->vacations()->create([
            'start' => $request->start,
            'finish' => $request->finish,
        ]);

        return redirect()->route('vacations.index')->with('success', 'Заявка на отпуск создана');
    }

    public function edit(Request $request, Vacation $vacation)
    {
        $data = compact('vacation');
        return view('vacations.edit', compact('data'));
    }

    public function update(Update $request, Vacation $vacation)
    {
        $vacation->update([
            'start' => $request->start,
            'finish' => $request->finish,
        ]);

        return redirect()->back()->with('success', 'Данные отпуска отредактированы');
    }

    /**
     * Утвердить отпуск
     */
    public function fixVacation(Vacation $vacation)
    {
        $vacation->update([
            'fix' => true,
        ]);

        return redirect()->back()->with('success', 'Отпуск утвержден');
    }

    /**
     * Удалить отпуск
     */
    public function destroy(Request $request, Vacation $vacation)
    {
        $vacation->delete();
        return redirect()->back()->with('success', 'Отпуск удален.');
    }
}
