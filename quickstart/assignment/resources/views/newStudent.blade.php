@extends('layout.app')
@section('content')
<div class="card">
  <div class="card-header bg-info text-white">
    <h5>New Student Information</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('addStudent.post') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="name" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter student name">
        @if ($errors->has('name'))
        <small class="text-danger">*{{ $errors->first('name') }}</small>
        @endif
      </div>

      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter student email">
        @if ($errors->has('email'))
        <small class="text-danger">*{{ $errors->first('email') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Choose major</label>
        <select class="form-select" value="{{ old('major') }}" name="major">
          <option value="">Choose major</option>
          @foreach ($majors as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('major'))
        <small class="text-danger">*{{ $errors->first('major') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">City</label>
        <input type="city" value="{{ old('city') }}" name="city" class="form-control" placeholder="Enter your home town">
        @if ($errors->has('city'))
        <small class="text-danger">*{{ $errors->first('city') }}</small>
        @endif
      </div>
      <a href="{{ route('studentList') }}" class="btn btn-danger float-start">Cancel</a>
      <input type="submit" value="Add Student" class="btn btn-success float-end">

    </form>
  </div>
</div>

@endsection