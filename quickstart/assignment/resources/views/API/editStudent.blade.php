@extends('layout.app')
@section('content')
<div class="card">
  <div class="card-header bg-info text-white">
    <h5>Student Information</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('API.editStudent.post',$student->id) }}" method="POST" id="edit-form">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input id="name" type="name" name="name" class="form-control" value="{{ $student->name }}" placeholder="Enter student name">
        @if ($errors->has('name'))
        <small class="text-danger">*{{ $errors->first('name') }}</small>
        @endif
      </div>

      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input id="email" type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter student email">
        @if ($errors->has('email'))
        <small class="text-danger">*{{ $errors->first('email') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Choose major</label>
        <select id="major" class="form-select" name="major">
          <option value="">Choose major</option>
          @foreach ($majors as $item)
          @if($student->major_id == $item->id)
          <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
          @else
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endif

          @endforeach
        </select>
        @if ($errors->has('major'))
        <small class="text-danger">*{{ $errors->first('major') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">City</label>
        <input id="city" type="city" name="city" class="form-control" value="{{ $student->city }}" placeholder="Enter your home town">
        @if ($errors->has('city'))
        <small class="text-danger">*{{ $errors->first('city') }}</small>
        @endif
      </div>
      <a href="{{ route('API.studentList') }}" class="btn btn-danger float-start">Cancel</a>
      <input type="submit" value="Update" class="btn btn-success float-end" id="update">
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#update').click(function() {
      $.ajax({
        type: 'post',
        url: 'api/student/api/edit/' + id,
        data: {
          'name': $("#name").val(),
          'email': $("#email").val(),
          'major_id': $("#major").val(),
          'city': $("#city").val(),
        },
        success: function(data) {
          location.reload();
          location.href = 'http://localhost:8000/students';
        }
      });
      var name = $("#name").val();
      var email = $("#email").val();
      var major = $("#major").val();
      var city = $("#city").val();

    });
  });
</script>

@endsection