{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')   
<form action="/organizer" method="post">
    <div class="modal-body">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="organizerName" class="form-label">Organizer Name</label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $datas['id'] }}">
            <input type="text" class="form-control" id="organizerName" name="organizerName" value="{{ $datas['organizerName'] }}">
        </div>
        <div class="mb-3">
            <label for="imageLocation" class="form-label">Organizer Image</label>
            <input type="text" class="form-control" id="imageLocation" name="imageLocation" aria-describedby="imageHelp" value="{{ $datas['imageLocation'] }}">
            <div id="imageHelp" class="form-text">Valid image link.</div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <input type="submit" class="btn btn-primary" value="Save"> --}}
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection