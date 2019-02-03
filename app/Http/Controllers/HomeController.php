<?php

namespace App\Http\Controllers;

use App\Event;
use App\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $sections = Section::with('photos')->get();

        $events = Event::all();

        return view('home', compact('sections', 'events'));
    }
}
