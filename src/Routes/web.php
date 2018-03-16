<?php

// src/Routes/web.php
Route::group(['middleware' => ['web', 'admin']], function () {
    // arts for album
    Route::get('admin/albums/{albumId}/arts', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@index');
    Route::get('admin/albums/{albumId}/arts/{id}/delete', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@destroy');
    Route::get('admin/albums/{albumId}/arts/{artId}/set-cover', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@setCover');
    Route::get('admin/albums/{albumId}/arts/{artId}/not-cover', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@notCover');
    // arts for track
    Route::get('admin/albums/{albumId}/tracks/{trackId}/arts', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@indexTrack');
    Route::get('admin/albums/{albumId}/tracks/{trackId}/arts/{id}/delete', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@destroyTrack');
    Route::get('admin/albums/{albumId}/tracks/{trackId}/arts/{artId}/set-cover', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@setCoverTrack');
    Route::get('admin/albums/{albumId}/tracks/{trackId}/arts/{artId}/not-cover', 'Vadiasov\ArtsAdmin\Controllers\ArtsController@notCoverTrack');
});
