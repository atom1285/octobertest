<?php

use Atom\Shoppinglist\Models\Item;
// use Atom\Shoppinglist\Http\Resources\UserResource; 

// * DEBUG

Route::get('/api/sl/hello', function() { 

    return 'hello world';

});


// * SELECTs

// * select all items
Route::get('/api/sl/get/all', function() {

    return Item::all();
     
});

// * select an item based on id
Route::get('/api/sl/get/id/{id}', function($id) {

    return Item::find($id);
     
});


// * select NOT completed items
Route::get('/api/sl/get/nc', function() {

    $items = Item::where('done', false)
    ->orderBy('id')
    ->get();

    return $items;
    
});

// * ADD ITEM --->> INSERT
// !!! expecting  name(string), quantity(int), unit(string)
Route::post('/api/sl/add', function() {
    
    $item = new Item;
    $item->fill(post());
    $item->save();

    return $item;
});

// * DELETE

// * deletes an item on the list(expecting id)
Route::delete('api/sl/del/{id}', function($id) {

    Item::destroy($id);

    return 'item deleted';
} );

// * UPDATE
Route::post('api/sl/updt/{id}', function($id) {

    $item = Item::find($id);

    $item->name = post('name');
    $item->quantity = post('quantity');
    $item->unit = post('unit');
    
    $item->save();

    return $item;
});

// * COMPLETE ITEM (set done to true)

Route::post('api/sl/comp/{id}', function($id) {

    // TODO: add a different response if item already completed

    $item = Item::find($id);
    $item->done = true;
    $item->save();

    return 'item completed, ITEM: ' . $item;
});