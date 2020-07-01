@extends('layouts.app')

@section('content')
<title>Success</title>

<div class="status-container">
  <div class="status">
    <img src="{{ asset('img/success.svg') }}" class="status-image" alt="">
    <img src="{{ asset('img/thank-you.svg') }}" class="status-image status-image-thank-you" alt="">
    <p class="status-message">Your order has been successfully placed.</p>
    <a class="button" href="/" to="#/">Return Home</a>
  </div>
</div>
@endsection