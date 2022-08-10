<?php

use Atom\Students\Models\Student;
use Atom\Students\Http\Resources\UserResource;


Route::get('/api/hello', function() { // * DEBUG

    return 'hello world';

});

Route::get('/api/get/students', function() { // * returns all arrivals

    return \Atom\Students\Models\Student::all();
    
});
    
Route::get('/api/add/student', function() { // * adds a student, expects 'name' and 'user_id'

    date_default_timezone_set('Europe/Bratislava');
    $datetime = date('Y-m-d H:i:s'); 

    $Student = new Student;
    $Student->fill(input());
    $Student->arrival_date = $datetime;
    $Student->save(); 

    return ('Príchod zaevidovaný');
});

Route::get('/api/get/my', function() { // * returns arrivals of the current logged in user, temporary: expecting user_id

    $arrivals = Student::where('user_id', input('user_id'))
    ->orderBy('id')
    ->firstOrFail();

    Event::fire('API:ownArrivalsReq'); // * fire custom event, event not used anywhere

    return $arrivals;

});