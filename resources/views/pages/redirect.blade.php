@extends('layouts.app')

@section('content')
<title>Redirect</title>

{{-- Hidden divs with data passed from the PHP server --}}
<div id="clientKey" class="hidden">{{$clientKey}}</div>

<script type="text/javascript" src="js/adyenImplementation.js"></script>
@endsection
