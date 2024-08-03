<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD Application</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="main_content pt-3">
    <div class="container">
      <div class="row">

       

        {{-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif --}}

        @if(session()->has('success'))
          {{-- <span class="alert alert-success">{{ session()->get('success') }}</span> --}}
          <span class="alert alert-success">{{ session('success') }}</span>
        @endif
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Add Student
            </div>
            
            <div class="card-body">
              <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label">Student Photo</label>
                  <input type="file" name="photo" id="">
                  @error('photo')
                  <div class="text-danger">{{ $message }}</div>       
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Student Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="John Smith">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>       
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Student Email</label>
                  <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@example.com">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>       
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              All Students
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @php $i=0; @endphp --}}
                  @foreach($students as $key => $student)
                  {{-- @php $i++ @endphp --}}
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('uploads/'.$student->photo) }}" style="width: 200px" height="200px" alt=""></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                      <a class="btn btn-info" href="{{ route('edit', $student->id) }}">Edit</a>
                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('delete', $student->id) }}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Deleted Students
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @php $i=0; @endphp --}}
                  @foreach($deleted as $key => $student)
                  {{-- @php $i++ @endphp --}}
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to restore this record?')" href="{{ route('restore', $student->id) }}">Restore</a>
                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record permanently?')" href="{{ route('force', $student->id) }}">Force Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>