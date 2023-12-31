<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Favicons -->
<meta name="theme-color" content="#712cf9">


    <style>
      html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input#floatingInput {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input#floatingPassword, .form-signin input#floatingEmail {
  margin-bottom: -1px;
  border-radius: 0;
}

.form-signin input#floatingPhone {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
  </head>
  <body class="text-center"> 
    <main class="form-signin w-100 m-auto">
      <form method="post" action="{{ url('/register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Silahkan signup</h1>
        @if(Session::has('status'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('status') }}
        </div>
        @endif
        <div class="form-floating">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username">
          <label for="floatingInput">Nama lengkap</label>
          @error('username')
          <div class="invalid-feedback">
            <strong>{{$message}}</strong>
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email">
          <label for="floatingEmail">Email</label>
          @error('email')
          <div class="invalid-feedback">
            <strong>{{$message}}</strong>
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password">
          <label for="floatingPassword">Password</label>
          @error('password')
          <div class="invalid-feedback">
            <strong>{{$message}}</strong>
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone" name="phone">
          <label for="floatingPhone">Nomor telpon</label>
          @error('phone')
          <div class="invalid-feedback">
            <strong>{{$message}}</strong>
          </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Sign in</button>
        <a href="{{ url('/') }}">sudah punya akun? Login disini!</a>
        <p class="mt-4 mb-3 text-muted">&copy; PT.Mexico 2022-2023</p>
      </form>
    </main>
  </body>
</html>