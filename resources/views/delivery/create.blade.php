@extends('layouts.main')
 
@section('title', 'Welcome')

@section('content')
    <h1>Create New Fruit!</h1>

    <form 
    method="POST" 
    action="/create-delivery"
    >
        @csrf
        <input placeholder="fruit delivery amount" 
            type="number" name="amount">
            <select name="fruit_id" id="cars">
                @foreach ($fruits as $fruitType)
                    <option value="{{$fruitType->id}}">
                        {{$fruitType->name}}</option>
                @endforeach
            </select>
        <input type="submit" value="Add">
    </form>
@endsection