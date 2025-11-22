<?php

use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;
use Botble\BulkPrice\Http\Controllers\BulkPriceController;

AdminHelper::registerRoutes(function () {
    Route::group([
        'prefix' => 'bulk-price',
        'as' => 'bulk-price.',
        'permission' => 'bulk-price.index',
    ], function () {
        Route::get('/', [BulkPriceController::class, 'index'])->name('index');
        Route::post('/', [BulkPriceController::class, 'update'])->name('update');
    });
});


