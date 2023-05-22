{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')   
<form action="/sport-events" method="post">
    <div class="modal-body">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="eventName" class="form-label">Event Name</label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $datas['id'] }}">
            <input type="text" class="form-control" id="eventName" name="eventName" value="{{ $datas['eventName'] }}">
        </div>
        <div class="mb-3">
            <label for="eventDate" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="eventDate" name="eventDate" value="{{ $datas['eventDate'] }}">
        </div>
        <div class="mb-3">
            <label for="eventType" class="form-label">Event Type</label>
            <input type="text" class="form-control" id="eventType" name="eventType" value="{{ $datas['eventType'] }}">
        </div>
        <div class="mb-3">
            <label for="organizerId" class="form-label">Organizer ID</label>
            <input type="text" class="form-control" id="organizerId" name="organizerId" aria-describedby="imageHelp" value="{{ $datas['organizer']['id'] }}">
            <input type="text" class="form-control" id="organizerName" name="organizerName" disabled value="{{ $datas['organizer']['organizerName'] }}">
            <div id="imageHelp" class="form-text">Valid Organizer ID.</div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <input type="submit" class="btn btn-primary" value="Save"> --}}
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection