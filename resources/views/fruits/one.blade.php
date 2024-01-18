@extends('layouts.main')
 
{{

    $fruitName = $fruit->name;
}}

@section('title', 'Fruit - '.$fruitName)

@section('content')
    <h1>{{$fruit->name}}</h1>
    <p>{{$fruit->slug}}</p>
    <img src="{{$fruit->image_url}}" alt="">
    <p>Price: {{$fruit->price}}</p>
    <p>Amount: {{$fruit->amount}}</p>
    
    <a href="/edit-fruit/{{$fruit->id}}">Edit</a>
    <a href="/delete-fruit/{{$fruit->id}}">Delete</a>
@endsection