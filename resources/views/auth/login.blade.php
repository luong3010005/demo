<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login Form Design | CodingAyush</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
  <div class="wrapper">
    <div class="title">
      Register
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
    >

      <div class="field">
        <input type="email" name="email" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>


      <div class="field">
        <input type="submit" value="Register">
      </div>
      <div class="signup-link">
        Already a member? <a href="{{ route('login') }}">Login now</a>
      </div>
    </form>
  </div>
</body>

</html>
