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

    return ['message' => 'all items selected', 'data' => Item::all(), 'response' => true];
     
});

// * select an item based on id
Route::get('/api/sl/get/id/{id}', function($id) {

    $item = Item::find($id);
    return ['message' => 'item selected', 'data' => $item, 'response' => true];
     
});


// * select NOT completed items
Route::get('/api/sl/get/nc', function() {

    $items = Item::where('done', false)
    ->orderBy('id')
    ->get();

    return ['message' => 'seleced not completed items', 'data' => $items, 'response' => true];
    
});

// * ADD ITEM --->> INSERT
// expecting  name(string), quantity(int), unit(string)
Route::post('/api/sl/add', function() {
    
    $item = new Item;
    $item->fill(post());
    
    if ($item->extraInfo == 'on') {
        $item->extraInfo = true;
    }
    else {
        $item->extraInfo = false;
    }
    
    $item->save();
    
    return ['message' => 'item added', 'data' => $item, 'response' => true];
});

// * DELETE

// * deletes an item on the list(expecting id)
Route::delete('api/sl/del/{id}', function($id) {

    $item = Item::find($id);
    Item::destroy($id);

    return ['message' => 'item deleted', 'data' => $item, 'response' => true];
} );

// * UPDATE
Route::post('api/sl/updt/{id}', function($id) {

    $item = Item::find($id);

    $item->name = post('name');
    $item->quantity = post('quantity');
    $item->unit = post('unit');
    
    $item->save();

    return ['message' => 'item updated', 'data' => $item, 'response' => true];
});

// * COMPLETE ITEM (set done to true)

Route::post('api/sl/comp/{id}', function($id) {

    $item = Item::find($id);

    if ( $item->done == true) {
        return ['message' => 'item already completed', 'response' => false];
    }

    $item->done = true;
    $item->save();

    return ['message' => 'item completed', 'data' => $item, 'response' => true];
});