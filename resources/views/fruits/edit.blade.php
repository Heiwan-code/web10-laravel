@extends('layouts.main')
 
@section('title', 'Welcome')

@section('content')
    <h1>Create New Fruit!</h1>

    <form 
    method="POST" 
    action="/edit-fruit/{{$fruit->id}}"
    enctype="multipart/form-data"
    >
        @method('patch')
        @csrf
        <input value="{{$fruit->name}}" 
            placeholder="fruit name" type="text" name="name" required>
        <input value="{{$fruit->slug}}" 
            placeholder="fruit slug" type="text" name="slug" required>
        {{-- TODO: image_url --}}
        <label for="image_url">Image</label>
        <input type="file" name="image_url" id="image_url">
        
        <input value="{{$fruit->price}}" placeholder="fruit price" step="0.01" type="number" name="price">
        <input value="{{$fruit->amount}}" placeholder="fruit amount" type="number" name="amount">

        <input type="submit" value="Update">
    </form>
@endsection