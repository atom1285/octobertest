<?php

use Atom\Students\Models\Student;

    Student::extend(function($Student) {
        $Student->bindEvent('model.afterSave', function() {
            
            //will do something...

            //example: 
            // date_default_timezone_set('Europe/Bratislava');
            // $datetime = date('Y-m-d H:i:s'); 

            // echo $datetime.'<br>';
        });
    } );