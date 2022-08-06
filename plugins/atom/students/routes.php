<?php

use Atom\Students\Models\Student;
use Atom\Students\Http\Resources\UserResource;

Route::get('/api/hello', function() {

    return 'hello world';

});

Route::get('/api/test/{id}', function($id) {
    return new UserResource(Student::findOrFail($id));
});

Route::get('/api/get/students', function() {

    return \Atom\Students\Models\Student::all();

});

Route::get('/api/add/student', function() {

    date_default_timezone_set('Europe/Bratislava');
    $datetime = date('Y-m-d H:i:s'); 

    $Student = new Student;
    $Student->fill(input());
    $Student->arrival_date = $datetime;
    $Student->save(); 

    return ('Príchod zaevidovaný');
});

Route::get('/api/get/my', function() {
    //expecting user_id
    
    // return input('user_id');

    // return \Atom\Students\Models\Student::where('user_id', input('user_id'));

    $arrivals = Student::where('user_id', input('user_id'))
    ->orderBy('id')
    ->get();

    return $arrivals;

});