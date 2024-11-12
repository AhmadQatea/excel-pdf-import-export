<!DOCTYPE html>
<html>
  
<head>
    <title>Excel import&export</title>
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="container">
        <h1 style="color: green;">
            Import Excel File and Download PDF
        </h1>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
           import excel file way one
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"> import excel file way one</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/users/import" method="POST" enctype="multipart/form-data" class="mx-2">
                <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="btn btn-primary form-label">input excel file</label>
                            <input class="form-control" type="file" name="file" id="formFile" style="display: none;">
                            <br>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
                </div>
              </div>
            </div>
          </div>
           <br>
          <div class="d-flex justify-content-between">
            <form action="/users/downloadPdf" method="post">
              @csrf
              <button type="submit" class="btn btn-success mb-2">
               <i class="fas fa-download"></i> <!-- أيقونة التحميل -->
               download pdf
              </button>
             </form>
             <form action="{{ route('user.deleteAll') }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all users?');">
                  <i class="fas fa-trash-alt"></i> <!-- أيقونة الحذف -->
                  delete all users
              </button>
          </form>
          </div>
           
        

        <div class="card">
          <div class="card-header bg-primary text-white">
                <h4 class="mb-0">User Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              <form action="{{ route('user.delete') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                                  <i class="fas fa-trash-alt"></i> <!-- أيقونة الحذف -->
                                </button>
                              </form>
                              <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> <!-- أيقونة التحديث -->
                              </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
