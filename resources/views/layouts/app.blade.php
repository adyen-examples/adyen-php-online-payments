<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.0.0/adyen.js"
    integrity="sha384-kcKKvS6qZbXycrUw31OJ2/2Hz8A8FTsV9anjvpyQc/IWR1SmkFUw7w7F/t5S3qtA"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.0.0/adyen.css"
    integrity="sha384-0IvbHDeulbhdg1tMDeFeGlmjiYoVT6YsbfAMKFU2lFd6YKUVk0Hgivcmva3j6mkK"
    crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Checkout Demo</title>
</head>
<body>
    <header id="header">
    <a href="/">
      <img src="{{ asset('img/mystore-logo.svg') }}" alt="">
    </a>
  </header>
  <div class="container">
      @yield('content')
  </div>
</body>
</html>



