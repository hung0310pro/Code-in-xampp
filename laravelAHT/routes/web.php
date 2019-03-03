<?php

/*http://localhost/laravelAHT/public/hello-world*/

Route::group(['prefix' => 'oopaht'], function () {

	// route cho sách
	Route::get('indexsach', ['as' => 'showsach', 'uses' => 'SachController@showListsach']);
	Route::post('indexsach', ['as' => 'themsach', 'uses' => 'SachController@addSach']);

	Route::get('updatesach/{id}', 'SachController@editSach');
	Route::post('updatesach/{id}', ['as' => 'suasach', 'uses' => 'SachController@updateSach']);
	// form sua k cần ghi action

	Route::get('deletesach/{id}', 'SachController@deleteSach');

	// route cho sinh viên
	Route::get('indexsinhvien', ['as' => 'showsinhvien', 'uses' => 'SinhVienController@showListsv']);
	Route::post('indexsinhvien', ['as' => 'themsv', 'uses' => 'SinhVienController@addSinhvien']);

	Route::get('updatesinhvien/{id}', 'SinhVienController@editSinhvien');
	Route::post('updatesinhvien/{id}', 'SinhVienController@updateSinhvien');

	Route::get('deletesinhvien/{id}', 'SinhVienController@deleteSinhvien');

	Route::get('watchsinhvien/{id}', 'SinhVienController@watchSinhvien');

	//Route cho thẻ mượn
	Route::get('indexthemuon', ['as' => 'showthemuon', 'uses' => 'TheMuonController@showThemuon']);

	Route::get('addthemuon', 'TheMuonController@showAddtm');
	Route::post('addthemuon', 'TheMuonController@addThemuon');

	Route::get('updatethemuon/{id}', 'TheMuonController@editThemuon');
	Route::post('updatethemuon/{id}', 'TheMuonController@updateThemuon');

	Route::get('deletethemuon/{id}', 'TheMuonController@deleteThemuon');

});
