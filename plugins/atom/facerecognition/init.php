<?php

use Atom\Students\Models\Student;

    Student::extend(function($Student) {
        $Student->bindEvent('model.afterSave', function() {
            
            // * this function is executed when a new arrival is added

            // * debug example: 
            
            // date_default_timezone_set('Europe/Bratislava');
            // $datetime = date('Y-m-d H:i:s'); 

            // echo $datetime.'<br>';
        });
    } );