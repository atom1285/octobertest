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


// * select NOT completed items
Route::get('/api/sl/get/all', function() {

    $items = Item::where('done', false)
    ->orderBy('id')
    ->firstOrFail();

    return $items;
    
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

    try {
        switch (post('whatToUpdate')) {
            case 'name':
                $item->name = post('newValue');
                break;
            case 'quantity':
                $item->quantity = post('newValue');
                break;
            case 'unit':
                $item->unit = post('newValue');
                break;
            default:
                echo "Wrong whatToUpdate entry";
        }
    } catch (Exception $e) {
        return $e;
    }

    $item->save();

    return 'item updated, ITEM: ' . $item;

} );

// * COMPLETE ITEM (set done to true)

Route::post('api/sl/comp/{id}', function($id) {

    $item = Item::find($id);
    $item->done = true;
    $item->save();

    return 'item completed, ITEM: ' . $item;
});