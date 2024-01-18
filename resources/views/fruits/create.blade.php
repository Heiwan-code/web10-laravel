@extends('layouts.main')
 
@section('title', 'Welcome')

@section('content')
    <h1>Create New Fruit!</h1>

    <form 
    method="POST" 
    action="/create-fruit"
    enctype="multipart/form-data"
    >
        @csrf
        <input placeholder="fruit name" type="text" name="name" required>
        <input placeholder="fruit slug" type="text" name="slug" required>
        {{-- TODO: image_url --}}
        <label for="image_url">Image</label>
        <input type="file" name="image_url" id="image_url">
        
        <input placeholder="fruit price" step="0.01" type="number" name="price">
        <input placeholder="fruit amount" type="number" name="amount">

        <input type="submit" value="Add">
    </form>
@endsection