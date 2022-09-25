<?php namespace Atom\ShoppingList\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Items Back-end Controller
 */
class Items extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Atom.ShoppingList', 'shoppinglist', 'items');
    }

    public function formAfterSave($item) {
        if ( strlen($item->extraInfoText) > 0 ) {
            $item->extraInfo = true;
            $item->save();
        }
        else {
            $item->extraInfo = false;
            $item->save();
        }
    }
}
