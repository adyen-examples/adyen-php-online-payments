@extends('layouts.app')

@section('content')
<title>Integration: {{$type}}</title>

{{-- Hidden divs with data passed from the PHP server --}}
<div id="paymentMethodsResponse" class="hidden">{{$response}}</div>
<div id="originKey" class="hidden">{{$originKey}}</div>
<div id="type" class="hidden">{{$type}}</div>

<div id="payment-page">
  <div class="container">
    @include('partials.customerform')
    {{-- The Checkout integration type will be conditionally rendered below --}}
    {{--   * Drop-in includes styling out-of-the-box, so no additional CSS classes are needed. --}}
    @if ($type == "dropin")
      <div id="dropin"></div>
    @else
      <div class="payment-container">
        <div id={{$type}} class="payment"></div>
      </div>
    @endif
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/adyenImplementation.js') }}"></script>
@endsection