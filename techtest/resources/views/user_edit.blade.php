{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')   
<h3 class="mt-3">Edit Account</h3>
<form action="/user" method="post">
    <div class="modal-body">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $datas['id'] }}">
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $datas['firstName'] }}" autofocus>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $datas['lastName'] }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $datas['email'] }}">
        </div>
    </div>
    <div class="modal-footer">
        {{-- <input type="submit" class="btn btn-primary" value="Save"> --}}
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection