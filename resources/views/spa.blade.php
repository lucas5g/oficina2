<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> --}}
  <title>Oficina 2.0</title>
  <style>
   *{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Roboto', sans-serif;
   }
    #app{
      /* background-color: blue; */
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* .container{
      height: 90vh;
      /* width: 100vw; 
    }  */
    
  </style>
</head>
<body>
  <div id="app">
    <Layout />
  </div>

  <script src="{{ mix('js/app.js')}}"></script>
</body>
</html>