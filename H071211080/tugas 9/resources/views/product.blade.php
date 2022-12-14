
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .mx-auto{
            margin-top:80px;
            width:800px;
        }
        .card {
            margin-top:10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-secondary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Products</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Select Table</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="/">Product</a></li>
              <li><a class="dropdown-item" href="/s">Seller</a></li>
              <li><a class="dropdown-item" href="/c">Category</a></li>
              <li><a class="dropdown-item" href="/pe">Permission</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>


<div class="mx-auto">
<div class="card">
  <div class="card-header bg-warning text-light" >
    Created / Edit Product
  </div>
  <div class="card-body">
    
    <form action="/" method="POST">  

    @csrf

    <div class="mb-3 row">
    <label for="nim" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" >
      </div>
  </div>
      
    <div class="mb-3 row">
    <label for="seller" class="col-sm-2 col-form-label">Seller_id</label>
    <div class="col-sm-10">
    <select class="form-control" id="seller" name="seller">
        <option value="">-Seller-</option>
        @foreach($seller as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
      </select>
    </div>
  </div>
  
  <div class="mb-3 row">
    <label for="category" class="col-sm-2 col-form-label">Category_id</label>
    <div class="col-sm-10">
      <select class="form-control" id="category" name="category">
        <option value="">-Category-</option>
        @foreach($category as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
      </select>
        </div>
  </div>

  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" >
      </div>
  </div>

  <div class="mb-3 row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="status" name="status" >
      </div>
  </div>

    <div class="mb-3 row">

  </div>
        <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-success">

        </div>
</form>
  </div>
</div>

<div class="card">
  <div class="card-header text-white bg-warning">
    Data Product
  </div>
  <div class="card-body">
    <table class="table">
        <thead>
             <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Seller</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
             </tr>
             </thead>
             <tbody>
              @foreach($data as $product)
                <tr>
                  <td></td>
                  <td>{{ $product->nama }}</td>
                  <td>{{ $product->seller->nama }}</td>
                  <td>{{ $product->category->nama }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->status }}</td>
                  <td>
                  <a href="/edit/{{ $product->id }}" type="button" class="btn btn-outline-primary" >Edit</a>
                  <a href="/delete/{{ $product->id }}" type="button" class="btn btn-outline-danger" >Delete</a>
                  </td>
                </tr>
                @endforeach
              <!--  -->
             </tbody>
    </table>

</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>