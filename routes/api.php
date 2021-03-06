<?php

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('brand', 'Api\BrandController@index')->name('api.brand.index');
    Route::delete('brand/{brand}', 'Api\BrandController@destroy')->name('api.brand.destroy');
    Route::get('brand/{brand}/item', 'Api\ItemController@brandItems')->name('api.item.brand');

    Route::get('country', 'Api\CountryController@index')->name('api.country.index');
    Route::delete('country/{country}', 'Api\CountryController@destroy')->name('api.country.destroy');
    Route::get('country/{country}/item', 'Api\ItemController@countryItems')->name('api.item.country');

    Route::get('aroma', 'Api\AromaController@index')->name('api.aroma.index');
    Route::delete('aroma/{aroma}', 'Api\AromaController@destroy')->name('api.aroma.destroy');

    Route::get('shop', 'Api\ShopController@index')->name('api.shop.index');
    Route::delete('shop/{shop}', 'Api\ShopController@destroy')->name('api.shop.destroy');
    Route::delete('shop/{shop}/item/{item}', 'Api\ShopController@remove')->name('api.shop.remove_item');
    Route::get('shop/{shop}/item', 'Api\ItemController@shopItems')->name('api.item.shop');

    Route::post('shop/{shop}/discount', 'Api\ShopController@setDiscounts')->name('api.shop.item.create.discount');
    Route::delete('shop/{shop}/discount', 'Api\ShopController@removeDiscounts')->name('api.shop.item.destroy.discount');

    Route::get('group', 'Api\GroupController@index')->name('api.group.index');
    Route::delete('group/{group}', 'Api\GroupController@destroy')->name('api.group.destroy');
    Route::get('group/{group}/item', 'Api\ItemController@groupItems')->name('api.item.group');

    Route::get('item', 'Api\ItemController@index')->name('api.item.index');
    Route::delete('item/{item}', 'Api\ItemController@groupRemove')->name('api.item.destroy');
    Route::delete('items', 'Api\ItemController@itemsDestroy')->name('api.items.destroy');
    Route::delete('item/{item}/group', 'Api\ItemController@destroy')->name('api.item.group.remove');
    Route::get('item/{item}/related', 'Api\ItemController@relatedItems')->name('api.item.related');

    Route::post('assign/item/shop', 'Api\ItemController@assignItemToShop')->name('api.item.shop.assign');
    Route::delete('assign/item/shop', 'Api\ItemController@removeItemFromShop')->name('api.item.shop.remove');

    Route::get('contractor', 'Api\ContractorController@index')->name('api.contractor.index');
    Route::delete('contractor/{contractor}', 'Api\ContractorController@destroy')->name('api.contractor.destroy');

    Route::get('item/{contractor}/unrelated', 'Api\ItemController@indexUnrelated')->name('api.item.unrelated');

    Route::get('contractors-items', 'Api\ContractorItemController@contractorsItemsUnrelatedList')
        ->name('api.contractors-items.unrelated.index');

    Route::get('contractor-item/{contractor}', 'Api\ContractorItemController@index')
        ->name('api.contractor-item.index');

    Route::get('deleted-item/{contractor}', 'Api\ContractorItemController@deletedItems')
        ->name('api.contractor-item.deleted_items');

    Route::delete('/contractor/{item}/{contractorItem}/', 'Api\ContractorController@destroyRelation')->name('api.relation.destroy');
});

