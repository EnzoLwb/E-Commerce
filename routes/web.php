<?php

Route::get('/', 'PagesController@root')->name('root')->middleware('verified');

Auth::routes(['verify' => true]);

//邮箱验证
Route::get('/email_verification_required', 'PagesController@emailVerificationRequired')->name('email-verification-required');
Route::post('/send_verification_mail', 'PagesController@sendVerificationMail')->name('send-verification-mail');
Route::get('/email_verification/{token}', 'PagesController@verifiedEmail')->name('verified_email');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
