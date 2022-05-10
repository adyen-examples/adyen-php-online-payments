<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.3.0/adyen.js"
    integrity="sha384-JvmVzbCK60Gcpx1h3mM13vJQGFfEOD6ZhuXN76Q/Wcz9KPVadwxK10zGHd1SMWn9"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.3.0/adyen.css"
    integrity="sha384-47lm6XSs4AdvQN9BdRTZykpp82IALHlxMtM5p378Nsg3O3nGoBB86N0d7GXgjrA3"
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



