@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    <h2>Creating Pay</h2>
    @include('payout._form', ['payout' => $payout])
</div></div>
@endsection