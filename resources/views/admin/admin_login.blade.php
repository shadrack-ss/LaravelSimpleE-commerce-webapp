<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('assets/css/admin_style.css') }}">

</head>
<body>

@if($errors->any())
   <div class="message">
      @foreach ($errors->all() as $error)
         <span>{{ $error }}</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      @endforeach
   </div>
@endif

<section class="form-container">
   <form action="/dashboardl" method="post">
      @csrf
      <h3>Admin Login</h3>
      <input type="text" name="name" required placeholder="Enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="password" required placeholder="Enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Login" class="btn">
   </form>
</section>

</body>
</html>
