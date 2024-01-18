<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Fruit;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    function create(Request $formData) {
        $delivery = new Delivery();
        $delivery->amount = $formData->amount;

        $fruit = Fruit::find($formData->fruit_id);
        $fruit->amount += $delivery->amount;
        $fruit->deliveries()->save($delivery);
        $fruit->save();

        return redirect('/create-delivery');
    }

    function getOne() {
        $deliveryId = request('id');
        $delivery = Delivery::find($deliveryId);

        return view('delivery.one', ['delivery' => $delivery]);
    }

    function createView() {
        $allFruits = Fruit::all();
        return view('delivery.create', ['fruits' => $allFruits]);
    }
}
