<?php

function CurlPost($action,$parameter) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://wapisender.com/api/v1/".$action."");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);
	$result = curl_exec($ch);
	$json = json_decode($result, true);
	return $json;
}

class WAPISENDER {
	    function __construct($data) {
	    $this->key = $data['key'];
	    $this->device = $data['device'];
	}

	public function SendMessage($pesan,$nomer) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'message' => $pesan
		);
		$post = CurlPost('send-message',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
	public function SendImage($nomer,$source,$filename,$caption) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'image' => base64_encode(file_get_contents($source)),
			'filename' => $filename,
			'caption' => $caption
		);
		$post = CurlPost('send-image',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
	public function SendVideo($nomer,$source,$filename,$caption) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'video' => base64_encode(file_get_contents($source)),
			'filename' => $filename,
			'caption' => $caption
		);
		$post = CurlPost('send-image',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
	public function SendVideo($nomer,$source,$filename,$caption) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'video' => base64_encode(file_get_contents($source)),
			'filename' => $filename,
			'caption' => $caption
		);
		$post = CurlPost('send-video',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
	public function SendAudio($nomer,$audio,$filename) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'audio' => base64_encode(file_get_contents($audio)),
			'filename' => $filename
		);
		$post = CurlPost('send-audio',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
	public function SendDoc($nomer,$doc,$filename,$caption) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'document' => base64_encode(file_get_contents($doc)),
			'filename' => $filename,
			'caption' => $caption
		);
		$post = CurlPost('send-document',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
public function SendLoc($nomer,$lat,$long,$address) {
		$request = array(
			'key' => $this->key,
			'device' => $this->device,
			'destination' => $nomer,
			'lat' => $lat,
			'long' => $long,
			'address' => $address
		);
		$post = CurlPost('send-location',$request);
		if($post == true) {
			return $post;
		} else {
			return $post['message'];
	}
}
}

$WASENDER = new WAPISENDER(['key' => "Key", 'device' => "Device"]);
