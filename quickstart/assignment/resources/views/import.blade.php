@extends('layout.app')
@section('content')
<div class="card-body">
  <a href="{{ route('studentList') }}" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-arrow-left"></i>Back</a>
  <form action="{{ route('student.import.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h2>Import</h2>
    <p>Choose file to import</p>
    <input type="file" name="file" class="form-control">
    <br>
    <button class="btn btn-success">Import Student Data</button>
  </form>
</div>

@endsection