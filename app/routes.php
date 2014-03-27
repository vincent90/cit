<?php
Route::group(["before" => "guest"], function()
{
    Route::any("/", [
        "as"   => "user/login",
        "uses" => "UserController@loginAction"
    ]);
    Route::any("/request", [
        "as"   => "user/request",
        "uses" => "UserController@requestAction"
    ]);
    Route::any("/reset", [
        "as"   => "user/reset",
        "uses" => "UserController@resetAction"
    ]);
});
Route::group(["before" => "auth"], function()
{

    Route::any("/profile", [
        "as"   => "user/profile",
        "uses" => "UserController@profileAction"
    ]);
    Route::any("/logout", [
        "as"   => "user/logout",
        "uses" => "UserController@logoutAction"
    ]);

    Route::post("/expense", [
        "as"   => "expense/view",
        "uses" => "ExpenseController@addExpense"
    ]);
    Route::get("/expense", [
        "as"   => "expense/view",
        "uses" => "ExpenseController@getInfo"
    ]);
    Route::any("/expense/create", [
        "as"   => "expense/create",
        "uses" => "ExpenseController@create"
    ]);

    Route::any("/expense/{id}/edit", [
        "as"   => "expense/{id}/edit",
        "uses" => "ExpenseController@edit"
    ]);

    Route::put("/expense/update/{id}", [
        "as"   => "expense",
        "uses" => "ExpenseController@update"
    ]);

    Route::delete("/expense/{id}", [
        "as"   => "expense",
        "uses" => "ExpenseController@destroy"
    ]);

    Route::get("/expense/{id}", [
        "as"   => "expense",
        "uses" => "ExpenseController@show"
    ]);

    Route::get("/tax/taxInfo", [
        "as"   => "tax/show",
        "uses" => "TaxController@show"
    ]);
});