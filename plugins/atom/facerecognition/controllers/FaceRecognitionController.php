<?php namespace Atom\FaceRecognition\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Face Recognition Controller Back-end Controller
 */
class FaceRecognitionController extends Controller
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

        BackendMenu::setContext('Atom.FaceRecognition', 'facerecognition', 'facerecognitioncontroller');
    }
}
