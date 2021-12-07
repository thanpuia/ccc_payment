<!DOCTYPE html>
<html lang="en">
  
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CCC</title>
</head>
<body>
    <ul class="nav justify-content-center background-color pt-2 shadow">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">New Receipt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
        </li>
    </ul>
    @yield('content')
</body>
<style>

    .background-color{
        background-color:#e65251;
        height: 60px;
       
    }
    .nav-link{
        color: #fafafa;
    }

</style>
</html>