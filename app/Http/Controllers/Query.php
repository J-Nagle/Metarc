<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Query extends Controller {
	private function curl($type,$data){
		$output = "";
		$api = "https://api.twitter.com/1.1/";

		if($type == "tweet"){
			$api .= "statuses/show.json?id=".$data;
		}elseif($type == "account"){
			$api .= "users/show.json?screen_name=".$data;
		}

		$get = curl_init();
		curl_setopt_array($get,[
			CURLOPT_URL				=> $api,
			CURLOPT_HTTPHEADER		=> ["authorization: Bearer ".env("TWITTER_BEARER")],
			CURLOPT_RETURNTRANSFER	=> true
		]);
		$output = curl_exec($get);
		curl_close($get);

		return $output;
	}

	public function __invoke(Request $r,$account = false,$tweet = false){
		$source	= $r->path() != '/' ? "https://twitter.com/".$r->path() : "";
		$type	= "";
		$json	= "{}";

		if(!empty($tweet) && !is_numeric($tweet)){
			return redirect("/{$account}");
		}elseif(!empty($tweet) && is_numeric($tweet)){
			$type = "tweet";
			$json = $this->curl($type,$tweet);
		}elseif(!empty($account)){
			$type = "account";
			$json = $this->curl($type,$account);
		}

		if($r->input("return") == "update"){
			return $json;
		}else{
			if($type == "tweet"){
				$verify = json_decode($json,true)["user"]["screen_name"];

				if($account != $verify){
					return redirect("/{$verify}/status/{$tweet}");
				}
			}

			return view("query",[
				"hint"	=> $r->input("hint") == "hide" ? false : true,
				"url"	=> $source,
				"json"	=> $json
			]);
		}
	}
}
