<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\ApplyRequest;
use App\Jobs\NotifyAboutApplication;
use Illuminate\Support\Facades\Request;

class ApplicationController extends Controller
{
    /**
     * @param $event
     * @param ApplyRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function apply($event, ApplyRequest $request)
    {
        $event = Event::find($event);

        $application = $event->applications()->create($request->all());

        NotifyAboutApplication::dispatch($application);

        return response('ok');
    }
}
