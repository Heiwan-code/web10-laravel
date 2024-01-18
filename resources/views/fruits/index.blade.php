@extends('layouts.main')
 
@section('title', 'All Fruits')

@section('content')
    <h1>All the Fruits!</h1>
    <a href="/create-fruit">Add New</a>
    @foreach ($fruits as $fruit)


        <a href="/fruit/{{$fruit->slug}}">        
            <h1>{{$fruit->name}}</h1>
            <img src="{{$fruit->image_url}}" alt="">
        </a>
        <p>{{$fruit->slug}}</p>
        <a href="/delete-fruit/{{$fruit->id}}">Delete</a>
        <a href="/edit-fruit/{{$fruit->id}}">Edit</a>
        <p>Price: {{$fruit->price}}</p>
        <p>Amount: {{$fruit->amount}}</p>


    @endforeach
@endsection