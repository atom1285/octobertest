<?php

use Atom\Shoppinglist\Models\Item;
// use Atom\Shoppinglist\Http\Resources\UserResource;

// * DEBUG

Route::get('/api/sl/hello', function() { 

    return 'hello world';

});


// * SELECTs

// * returns all items
Route::get('/api/sl/get/{SelectType}', function($SelectType) {

    if ( $SelectType == 'all' ) {
        return \Atom\Students\Models\Student::all();
    }
    
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

    return 'item updated, ITEM: ' . $item ;

} );