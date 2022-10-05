<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Adyen JS from TEST environment (change to live for production)-->
  <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.26.0/adyen.js"
     integrity="sha384-lI43zM/9FpB4HKD0qDaUXy+Cfmxu+hHDwk+7XERAh/zYcQkm/oimV1Cmx7oZ3mL4"
     crossorigin="anonymous"></script>

  <!-- Adyen CSS from TEST environment (change to live for production)-->
	<link rel="stylesheet"
     href="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/5.26.0/adyen.css"
     integrity="sha384-EWxYZbuFOr+TBHe/ugu0v3NOulSLFDx8Diy1Mb2WJk1TNzTJJHAuwiwW3gq6btNx"
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



