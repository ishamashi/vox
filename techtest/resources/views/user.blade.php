{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')   
@if (session()->has('success'))            
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h3 class="mt-3">My Account</h3>
<div class="modal-body">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="hidden" class="form-control" id="id" name="id" value="{{ $datas['id'] }}">
        <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $datas['firstName'] }}" readonly>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $datas['lastName'] }}" readonly>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $datas['email'] }}" readonly>
    </div>
</div>
<div class="modal-footer">
    <a href="/user/edit/{{$datas['id']}}" class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i> Edit</a>
</div>
@endsection