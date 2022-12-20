<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // User Type
    Route::apiResource('user-types', 'UserTypeApiController');

    // Bank Master
    Route::apiResource('bank-masters', 'BankMasterApiController');

    // Stage Master
    Route::apiResource('stage-masters', 'StageMasterApiController');

    // Product Master
    Route::apiResource('product-masters', 'ProductMasterApiController');

    // Customers
    Route::apiResource('customers', 'CustomersApiController');

    // Loan Master
    Route::apiResource('loan-masters', 'LoanMasterApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');
});
