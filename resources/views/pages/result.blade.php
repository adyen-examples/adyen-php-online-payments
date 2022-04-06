@extends('layouts.app')

@section('content')
<title>Result: {{$type}}</title>

<div class="status-container">
  <div class="status">
    @if ($type == "error" || $type == "failed")
    <img src="img/failed.svg" class="status-image" alt="failed">
    @else
    <img src="img/success.svg" class="status-image" alt="success">
    <img src="img/thank-you.svg" class="status-image status-image-thank-you" alt="thank you">
    @endif
    <p class="status-message">
        @if ($type == "error")
            Error! Review response in console and refer to <a href="https://docs.adyen.com/development-resources/response-handling">Response handling.</a>
        @elseif ($type == "failed")
            The payment was refused. Please try a different payment method or card.
        @elseif ($type == "pending")
            Your order has been received! Payment completion pending.
        @else
            Your order has been successfully placed.
        @endif
    </p>
    <a class="button" href="/" to="#/">Return Home</a>
  </div>
</div>

@endsection
