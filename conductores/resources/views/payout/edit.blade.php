@extends('layouts.app')

@section('content')
    <h2>Editing payout</h2>
    @include('payout._form', ['payout' => $payout])
@endsection