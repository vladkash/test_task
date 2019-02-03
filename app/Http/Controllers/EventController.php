<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @var array
     */
    const educationLevels = [
        'Bachelor', 'Master', 'PhD'
    ];

    /**
     * @param $event
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($event, Request $request)
    {
        $events = Event::all();

        $event = Event::with('photos')->find($event);

        $educationLevels = static::educationLevels;

        return view('event', compact('event','events', 'educationLevels', 'request'));
    }
}
