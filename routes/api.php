<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryApiController;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function () {
    $validator = validator(request()->all(), [
        'eamil' => 'requierd',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response($validator->errors()->all(), 400);
    }

    $user = User::where('email', request()->email)->first();
    if ($user) {
        if (password_verify(request()->password, $user->password)) {
            return $user->createToken('browser')->plainTextToken;
        }
    }

    return response(['msg' => 'Incorrect email or password!'], 401);
});

Route::apiResource('/categories', CategoryApiController::class);
