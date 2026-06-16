<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Adyen JS from TEST environment (change to live for production)-->
  <script src="{{ config('services.adyen.web_js_url') }}"
     integrity="{{ config('services.adyen.web_js_integrity') }}"
     crossorigin="anonymous"></script>

  <!-- Adyen CSS from TEST environment (change to live for production)-->
  <link rel="stylesheet"
     href="{{ config('services.adyen.web_css_url') }}"
     integrity="{{ config('services.adyen.web_css_integrity') }}"
     crossorigin="anonymous">

  <link rel="stylesheet" href="/css/app.css">
  <script>window.adyenEnvironment = @json(config('services.adyen.web_environment'));</script>
  <title>Checkout Demo</title>
</head>
<body>
    <header id="header">
    <a href="/">
      <img src="/img/mystore-logo.svg" alt="">
    </a>
  </header>
  <div class="container">
      @yield('content')
  </div>
</body>
</html>

