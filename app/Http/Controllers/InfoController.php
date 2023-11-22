<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InfoController extends Controller
{


    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): \Illuminate\Http\RedirectResponse
    {
        Info::truncate();
        return redirect()->route('home')->with('success', 'Записи видалено');
    }
}
