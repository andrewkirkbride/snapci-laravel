<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Client;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $clients = Client::orderBy('created_at', 'asc')->get();

    return view('clients', [
        'clients' => $clients
    ]);
});

/**
 * Add New Task
 */
Route::post('/client', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'last_name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $client = new Client;
    $client->last_name = $request->last_name;
    $client->first_name = $request->first_name;
    $client->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/client/{client}', function (Client $client) {
    $client->delete();

    return redirect('/');
});