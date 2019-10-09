<?php

Route::get('/',"Query");
Route::get("/{account}","Query");
Route::get("/{account}/status/{tweet}","Query");
Route::redirect("/{account}/status","/{account}");
Route::redirect("/{account}/status/{tweet}/{junk}","/{account}/status/{tweet}");
