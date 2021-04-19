<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/4.1.0/adyen.js"
     integrity="sha384-3tEepwhhMcyxgIbL3HBe3I59BpSMNyKoNrbKWARYH1tJ7K7K6NdTDqOltKlwiVsH"
     crossorigin="anonymous"></script>

  <link rel="stylesheet"
     href="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/4.1.0/adyen.css"
     integrity="sha384-+CPzBNZVkBXu4uXDECnVuVQ24Kl8vWrR61UzuuuUj5IBEP//BQ0G0KDNfz2iPcvJ"
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



