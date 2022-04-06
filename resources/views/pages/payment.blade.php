@extends('layouts.app')

@section('content')
<title>Integration: {{$type}}</title>

{{-- Hidden divs with data passed from the PHP server --}}
<div id="clientKey" class="hidden">{{$clientKey}}</div>
<div id="type" class="hidden">{{$type}}</div>

<div id="payment-page">
  <div class="container">
    {{-- The Checkout integration type will be rendered below --}}
    {{-- Drop-in includes styling out-of-the-box, so no additional CSS classes are needed. --}}
    <div class="payment-container">
        <div id="payment" class="payment"></div>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/adyenImplementation.js"></script>
@endsection
