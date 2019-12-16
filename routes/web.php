<?php
Route::get('/comida', 'ComidaController@ConsumirApiComida');
Route::get('/','ComidaController@listarComidas');