{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>
<p>Last Id Insert : {{ $last_id }}</p>
<table class="table table-striped" border="1px solid black">
    <tr>
        <th style="width: 30%;">Event Name</th>
        <th>Event Date</th>
        <th>Event Type</th>
        <th>Event Organizer</th>
        <th>Aksi</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td>{{ $data['eventName'] }}</td>
        <td>{{ $data['eventDate'] }}</td>
        <td>{{ $data['eventType'] }}</td>
        <td>{{ $data['organizer']['organizerName'] }}</td>
        <td>
            <a href="/sport-events/delete/{{ $data['id'] }}"  class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
            <a href="/sport-events/edit/{{ $data['id'] }}"  class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
        </td>
    </tr>
    @endforeach 
</table>

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/sport-events" method="post">
                <div class="modal-body">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="eventName" name="eventName">
                    </div>
                    <div class="mb-3">
                        <label for="eventDate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="eventDate" name="eventDate">
                    </div>
                    <div class="mb-3">
                        <label for="eventType" class="form-label">Event Type</label>
                        <input type="text" class="form-control" id="eventType" name="eventType">
                    </div>
                    <div class="mb-3">
                        <label for="organizerId" class="form-label">Organizer ID</label>
                        <input type="text" class="form-control" id="organizerId" name="organizerId" aria-describedby="imageHelp">
                        <div id="imageHelp" class="form-text">Valid Organizer ID.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <input type="submit" class="btn btn-primary" value="Save"> --}}
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection