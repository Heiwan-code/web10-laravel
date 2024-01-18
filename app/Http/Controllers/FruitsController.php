<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FruitsController extends Controller
{
    function getAll() {
        return Fruit::all();
    }

    function returnOne() {
        $slug = request('slug');
        $fruit = Fruit::where('slug', $slug)->first();
        return view('fruits.one',  ['fruit' => $fruit]);
    }

    function fruitsView() {
        $allFruits = $this->getAll();
        return view('fruits.index',  ['fruits' => $allFruits]);
    }

    function editView() {
        $itemId = request('id');
        $fruitToEdit = Fruit::find($itemId);
        return view('fruits.edit',  ['fruit' => $fruitToEdit]);
    }

    function edit(Request $formData) {
        $itemId = request('id');
        $fruitToEdit = Fruit::find($itemId);
        $fruitToEdit->name = $formData->name;
        $fruitToEdit->slug = $formData->slug;
        // if no image_url gotten from passed data, 
        // then resort to default image
        if (!$formData->image_url) {
            $fruitToEdit->image_url = "https://thumbs.dreamstime.com/z/vector-illustration-bowl-fruit-black-silhouette-vector-illustration-bowl-fruit-silhouette-isolated-white-191067735.jpg";
        } else {
            $imageUrl = $this->uploadImage($formData);
            $fruitToEdit->image_url = $imageUrl;
        }
        $fruitToEdit->price = $formData->price;
        $fruitToEdit->amount = $formData->amount;

        $fruitToEdit->save();
        return redirect('/fruits');
    }


    function delete() {
        $itemId = request('id');
        $fruitToDelete = Fruit::find($itemId);
        $fruitToDelete->delete();

        return redirect('/fruits');
    }

    function create(Request $formData) {
        $fruit = new Fruit();
        $fruit->name = $formData->name;
        $fruit->slug = $formData->slug;
        // if no image_url gotten from passed data, 
        // then resort to default image
        if (!$formData->image_url) {
            $fruit->image_url = "https://thumbs.dreamstime.com/z/vector-illustration-bowl-fruit-black-silhouette-vector-illustration-bowl-fruit-silhouette-isolated-white-191067735.jpg";
        } else {
            $imageUrl = $this->uploadImage($formData);
            $fruit->image_url = $imageUrl;
        }
        $fruit->price = $formData->price;
        $fruit->amount = $formData->amount;

        $fruit->save();

        return redirect('/fruits');
    }

    function uploadImage(Request $formData) {
        $file = $formData->file("image_url");
        $randomName = uniqid(). '.' . $file->extension();
        Storage::putFileAs(
            'public/images', 
            $file,
            $randomName
        );
        $publicPath = asset('storage/images/'.$randomName);
        return $publicPath;
    }

}
