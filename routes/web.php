<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::view('/about', 'about');
Route::view('/contact', 'contact');



Route::get('/', function () {
	// $ideas = Idea::all();
	// $ideas = Idea::all();
	$ideas = Idea::query()
		->when(request('state'), function($query, $state) {
			$query->where('state', $state);
		})
		->get();

	return view('ideas', [
		'ideas' => $ideas,
	]);
});


Route::post('/ideas', function () {

	Idea::create([
		'description' => request('idea'),
		'state' => 'pending',
	]);

	return redirect('/');
});

Route::get('/delete-ideas' , function () {
	session()->forget('ideas');

	return redirect('/');
});
