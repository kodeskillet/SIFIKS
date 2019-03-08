@extends('layouts.app')

@section('content1')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin">
  <h1 class="h3 mb-3 font-weight-normal">Log In</h1>
  <label for="inputEmail" class="sr-only">Alamat Email</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Alamat Email" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Ingat Saya
    </label>
  </div>
  <p>Belum mempunyai akun ? <a href="/signup">Register Disini</a></p>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
</form>
</body>
</html>

@endsection

<style>
.form-signin {
    width: 100%;
    max-width: 330px;
    padding: 10px;
    margin: auto;
}
</style>
