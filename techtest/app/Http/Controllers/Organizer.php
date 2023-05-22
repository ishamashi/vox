<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Organizer extends Controller
{
    public function index($id = '') {
        if (session()->has('tokenApi')) {
            $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers', [
                'token' => session()->get('tokenApi'),
            ]);
            // $response = Http::post('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers', [
            //     'organizerName' => 'ICHO ORGANIZERS',
            //     'imageLocation' => '/',
            //     'token' => session()->get('tokenApi'),
            // ]);
            // {"id":903,"organizerName":"ICHO ORGANIZERS","imageLocation":"\/"}
            return view('organizer', [
                "title" => "ORGANIZER",
                "datas" => $response['data'],
                "last_id" => $id
            ]);
        }
        return redirect('/login');
    }
    
    public function add(Request $request) {
        if ($request->id) {
            $response = Http::PUT('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$request->id, [
                'organizerName' => $request->organizerName,
                'imageLocation' => $request->imageLocation,
                'token' => session()->get('tokenApi'),
            ]);
            $id_new = $request->id;
        } else {
            $response = Http::POST('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers', [
                'organizerName' => $request->organizerName,
                'imageLocation' => $request->imageLocation,
                'token' => session()->get('tokenApi'),
            ]);
            $id_new = $response['id'];
        }

        return redirect('/organizer/last_id/'.$id_new);
    }
    
    public function delete($id) {
        $response = Http::DELETE('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$id, [
            'token' => session()->get('tokenApi'),
        ]);
        return redirect('/organizer');
    }

    public function edit($id) {
        $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/organizers/'.$id, [
            'token' => session()->get('tokenApi'),
        ]);

        return view('organizer_edit', [
            "title" => "ORGANIZER",
            "datas" => $response,
            "last_id" => $id
        ]);
    }
}
