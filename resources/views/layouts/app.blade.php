<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Adyen JS from TEST environment (change to live for production)-->
  <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.68.0/adyen.js"
     integrity="sha384-U9GX6Oa3W024049K86PYG36/jHjkvUqsRd8Y9cF1CmB92sm4tnjxDXF/tkdcsk6k"
     crossorigin="anonymous"></script>

  <!-- Adyen CSS from TEST environment (change to live for production)-->
  <link rel="stylesheet"
     href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.68.0/adyen.css"
     integrity="sha384-gpOE6R0K50VgXe6u/pyjzkKl4Kr8hXu93KUCTmC4LqbO9mpoGUYsrmeVLcp2eejn"
     crossorigin="anonymous">

  <link rel="stylesheet" href="/css/app.css">
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



