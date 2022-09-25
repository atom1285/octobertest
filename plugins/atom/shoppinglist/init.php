<?php

use Atom\Shoppinglist\Models\Item;

    Item::extend(function($Item) {
        $Item->bindEvent('model.afterSave', function() {            
            // this function is executed when a new item is added
            // if ( isset($Item->extraInfoText) && !empty($extraText = $Item->extraInfoText) ) {
                // $Item->extraInfo = true;
                // $Item->save();
            // }
        });
    } );