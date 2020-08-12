<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  <title>Oficina 2.0</title>
  <style>
    html, body, #app{
      height: 100%;
      width: 100%;

      margin: 0;
      bottom: 0;
    }
    
    #app{
      /* background: red; */
    }
    .container{
      height: 90vh;
      /* width: 100vw; */
    } 
    
  </style>
</head>
<body>
  <div id="app" class="">
    <Layout />
  </div>

  <script src="{{ mix('js/app.js')}}"></script>
</body>
</html>