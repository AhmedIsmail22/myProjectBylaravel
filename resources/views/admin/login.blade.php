<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style1.css">

</head>
<body>
    <section class="form-container">
       
        <form action="{{url("admin/login")}}" method="POST">
            @csrf
           <h3>login now</h3>
           @if ($error)
           <div class="alert alert-danger text-center mx-auto w-100 fs-3">{{$error}}</div>
           @endif
           <p>default username = <span>admin</span> & password = <span>111</span></p>
           <input type="text" name="name"  placeholder="enter your name" value="{{old("name")}}" class="box">
            @error('name')
                <div class="alert alert-danger text-center mx-auto w-100 fs-3">{{$message}}</div>
            @enderror
           <input type="password" name="password"  placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
           @error('password')
                <div class="alert alert-danger text-center mx-auto w-100 fs-3">{{$message}}</div>
            @enderror
            {{-- <input type="submit" value="login now" class="btn" name="submit"> --}}
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
     
     </section>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>