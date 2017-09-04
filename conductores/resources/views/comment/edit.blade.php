@extends('layouts.app')

@section('content')
    <h2>Editing Comment</h2>
    @include('comment._form', ['comment' => $comment])
@endsection