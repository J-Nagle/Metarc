<?php

$update = "";

if(!empty($_GET["return"]) && $_GET["return"] == "update"){
	$update = "?return=update";
}

Route::get('/',"Query");
Route::get("/{account}","Query");
Route::get("/{account}/status/{tweet}","Query");
Route::redirect("/{account}/status","/{account}".$update);
Route::redirect("/{account}/status/{tweet}/{junk}","/{account}/status/{tweet}".$update);
