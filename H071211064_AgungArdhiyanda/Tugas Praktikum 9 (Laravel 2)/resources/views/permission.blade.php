<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    .mx-auto {
      margin-top: 80px;
      width: 800px;
    }

    .card {
      margin-top: 10px;
    }
  </style>
</head>

<body style="background-color:black;">

  <nav class="navbar navbar-dark bg-secondary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Permission</a>
      <a class="navbar-brand" href="/">Product</a>
      <a class="navbar-brand" href="/s">Seller</a>
      <a class="navbar-brand" href="/c">Category</a>


  </nav>

  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/apache.jpg" class="d-block w-100" alt="apache">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="font-weight-bold" style="font-size:35px;">AH-64 Apache</h5>
          <p>Air Support</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/himars.jpg" class="d-block w-100" alt="himars">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="font-weight-bold" style="font-size:35px;">High Mobility Artillery System</h5>
          <p>The Most Accurate Artillery So Far</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/f35.jpg" class="d-block w-100" alt="mig31">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="font-weight-bold" style="font-size:35px;">F35</h5>
          <p>US Multirole Jet Fighter</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>

  </div>

  <div class="mx-auto">
    <div class="card">
      <div class="card-header">
        Created / Edit Permission
      </div>
      <div class="card-body">

        <form action="pe" method="POST">

          @csrf

          <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="desk" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="desk" name="desk">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="status" name="status">
            </div>
          </div>

          <div class="mb-3 row">

          </div>
          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">

          </div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        Data Permission
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

            @foreach($data as $permission)
            <tr>
              <td></td>
              <td>{{ $permission->nama }}</td>
              <td>{{ $permission->description }}</td>
              <td>{{ $permission->status }}</td>
              <td>
                <a href="pe/edit/{{ $permission->id }}" type="button" class="btn btn-outline-primary">Edit</a>
                <a href="/pe/delete/{{ $permission->id }}" type="button" class="btn btn-outline-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>


    </div>
  </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>