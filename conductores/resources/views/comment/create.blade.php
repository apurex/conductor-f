@extends('layouts.app')

@section('content')
    <h2>Creating Post</h2>
    @include('comment._form', ['comment' => $comment])
@endsection