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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Edit Student
            </div>
            
            <div class="card-body">
              <form action="{{ route('update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label">Existing Photo</label>
                  <div><img src="{{ asset('uploads/'.$student->photo) }}" style="width: 200px" alt=""></div>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Upload Photo</label>
                  <input type="file" name="photo" class="form-control">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>       
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Student Name</label>
                  <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="John Smith">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>       
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Student Email</label>
                  <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="name@example.com">
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>       
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-primary" value="Update">
                </div>
              </form>
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