<?php

/*
|--------------------------------------------------------------------------
| Catcha Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => 'captcha'), function()
{
    Route::get('start/{howmany}', array('as' => 'captcha/start', 'uses'=>'CaptchaController@start'));
    Route::get('audio/{type?}', array('as' => 'captcha/audio', 'uses'=>'CaptchaController@audio'));
    Route::get('image/{index?}', array('as' => 'captcha/image', 'uses'=>'CaptchaController@image'));
});        
