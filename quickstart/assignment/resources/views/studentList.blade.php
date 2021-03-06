@extends('layout.app')

@section('content')
@if (Session::has('nullMessage'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ Session::get('nullMessage') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
  <div class="card-header">
    <h5 class="float-start">Search Student</h5>

  </div>
  <div class="card-body">
    <form action="{{ route('search.post') }}" method="post">
      @csrf
      <div class="d-flex mb-3 float-none justify-content-between">
        <input type="text" name="name" placeholder="Enter student name">
        <input type="text" name="city" placeholder="Enter City">
        <div>
          <label> Choose StartDate </label>
          <input type="date" name="start" class="form-control">
        </div>
        <div>
          <label> Choose EndDate </label>
          <input type="date" name="end" class="form-control">
        </div>
      </div>
      <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i> Search</button>

    </form>
  </div>
</div>


@if (Session::has('successMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ Session::get('successMessage') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (Session::has('deleteMessage'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ Session::get('deleteMessage') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex mb-3 float-none justify-content-between">
  <a href="{{ route('addStudent.get') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Student</a>
  <a href="{{ route('mail.get') }}" class="btn btn-info"><i class="far fa-envelope"></i> Send Mail</a>
  <a href="{{ route('student.export') }}" class="btn btn-success float-start .ms-1"><i class="fa fa-download"></i> Export</a>
  <a href="{{ route('student.import.get') }}" class="btn btn-success float-end"><i class="fas fa-file-import"></i> Import</a>

</div>

<table class="table table-info table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
      <th>City</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @if (count($students)>0)
    @foreach ($students as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->major->name }}</td>
      <td>{{ $item->city }}</td>
      <td>
        <a href="{{ route('edit.student.get',$item->id) }}"><i class="fas fa-edit text-primary"></i></a>
        <i class="fas fa-trash-alt text-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"></i>
        <!-- Modal -->
        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure to delete this record?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="{{ route('delete.student',$item->id) }}" class="btn btn-danger">Yes</a>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="6">
        <p class="d-flex justify-content-center text-danger">No students yet!</p>
      </td>
    </tr>
    @endif
  </tbody>
</table>

@endsection