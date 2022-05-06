<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.13.1/adyen.js"
    integrity="sha384-M3DQX1ovYxJTUt7n1uN1IyRvhCtILxV+AwB5hHntGwmiYW2uRr4lmJnj0ToaqyFy"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/5.13.1/adyen.css"
    integrity="sha384-r7Ye68dqFoSnkRA9wgyLKiVNga2c+G98mIVq4FT+Rmi6ba0EH2/YI3ZGYvpZ3zIM"
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



