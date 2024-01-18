@extends('layouts.main')

@section('title', 'Delivery')

@section('content')
    <h1> Delivery#{{$delivery->id}}</h1>
    <p>Delivery of {{$delivery->fruit->name}} 
        for {{$delivery->amount}}</p>

    <p>{{$delivery->created_at}}</p>
@endsection