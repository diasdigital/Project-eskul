<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: #222f24">
    
    <div class="container col-xl-8 col-lg-10 col-md-12">
      <div class="m-5 width-50 text-center bg-light bg-gradient" style="border-radius: 50px">
        <div class="row align-items-center h-50">
          <div class="col pt-5">
            
            <div class="row mb-5">
              <div class="col">
                <h2 class="heading-section">LOGIN</h2>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10">
                <form action="/login" method="POST">
                @csrf
                  <div class="mb-4">
                    <input type="text" name="username" class="form-control @if(session()->has('loginError')) is-invalid @endif" id="username" placeholder="Username">
                    <div class="invalid-feedback">
                      {{ session('loginError') }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Kata sandi">
                  </div>
                  <button class="w-50 mt-5 btn text-white fw-bold mb-3" style="background-color: rgb(33, 80, 37)" type="submit">Login</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col">
            <img src="/assets/img/login.jpg" class="img-fluid" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px">
          </div>
        </div>
        <div></div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>