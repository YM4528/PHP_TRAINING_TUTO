@extends('API.layout.app')
@section('content')
<div class="mb-3">
  <h1>Student List with Ajax</h1>
  <a href="{{ route('API.addStudent.get') }}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> New Student</a>
</div>
<div class="message"></div>

<table class="table table-striped ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
      <th>City</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody id="tbd">
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/api/students',
      success: function(result) {
        result.forEach(students => {
          $("#tbd").append(`<tr>
                <td>${students.id}</td>
                <td>${students.name}</td>
                <td>${students.email}</td>
                <td>${students.major_name}</td>
                <td>${students.city}</td>
                <td>

                <td><a id="edit-post"
                        data-id="${students.id}" href="api/students/api/edit/${students.id}"
                        class="btn btn-info">Edit</a></td>
                    </td>
                    <td><a id="delete-post"
                        data-id="${students.id}" href="api/students/api/delete/${students.id}"
                        class="btn btn-danger">Delete</a></td>
                    </td>
    
                </td>
                student/delete/{id}
                </tr>`);
        });
        console.log(result);
      }
    });


    $(document).on('click', '#edit-post', function() {

      var id = $(this).data('id');
      var url = 'http://localhost:8000/students/api/edit/' + id + '';

      $.get(url, {
        id: id
      }, function(data) {
        console.log(data);
      }, 'json');
    });



  });
</script>

@endsection