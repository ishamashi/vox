{{-- @dd($datas) --}}
@extends('layouts.main')

@section('container')   
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>
<p>Last Id Insert : {{ $last_id }}</p>
<table class="table table-striped" border="1px solid black">
    <tr>
        <th>ID</th>
        <th style="width: 30%;">Name</th>
        <th>Image</th>
        <th>Src Image</th>
        <th>Aksi</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td>{{ $data['id'] }}</td>
        <td>{{ $data['organizerName'] }}</td>
        <td><img  style="height: 50px" src="{{ $data['imageLocation'] }}" alt=""></td>
        <td>{{ $data['imageLocation'] }}</td>
        <td>
            <a href="/organizer/delete/{{ $data['id'] }}"  class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
            <a href="/organizer/edit/{{ $data['id'] }}"  class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
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
            <form action="/organizer" method="post">
                <div class="modal-body">
                    {{ method_field('POST') }}
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="organizerName" class="form-label">Organizer Name</label>
                        <input type="text" class="form-control" id="organizerName" name="organizerName">
                    </div>
                    <div class="mb-3">
                        <label for="imageLocation" class="form-label">Organizer Image</label>
                        <input type="text" class="form-control" id="imageLocation" name="imageLocation" aria-describedby="imageHelp">
                        <div id="imageHelp" class="form-text">Valid image link.</div>
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