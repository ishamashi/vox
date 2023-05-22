<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Event extends Controller
{
    public function index($id = '') {
        if (session()->has('tokenApi')) {
            $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events', [
                'token' => session()->get('tokenApi'),
            ]);
            return view('sport-event', [
                "title" => "SPORT EVENT",
                "datas" => $response['data'],
                "last_id" => $id
            ]);
        }
        return redirect('/login');
    }

    public function add(Request $request) {
        if ($request->id) {
            $response = Http::PUT('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events/'.$request->id, [
                'eventDate'     => $request->eventDate,
                'eventType'     => $request->eventType,
                'eventName'     => $request->eventName,
                "organizerId"   => $request->organizerId,
                'token' => session()->get('tokenApi'),
            ]);
            $id_new = $request->id;
        } else {
            $response = Http::POST('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events', [
                'eventDate'     => $request->eventDate,
                'eventType'     => $request->eventType,
                'eventName'     => $request->eventName,
                "organizerId"   => $request->organizerId,
                'token' => session()->get('tokenApi'),
            ]);
            $id_new = $response['id'];
        }

        return redirect('/sport-events/last_id/'.$id_new);
    }

    public function delete($id) {
        $response = Http::DELETE('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events/'.$id, [
            'token' => session()->get('tokenApi'),
        ]);
        return redirect('/sport-events');
    }

    public function edit($id) {
        $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events/'.$id, [
            'token' => session()->get('tokenApi'),
        ]);

        // return $response;
        return view('sport-event_edit', [
            "title" => "ORGANIZER",
            "datas" => $response,
            "last_id" => $id
        ]);
    }
}
