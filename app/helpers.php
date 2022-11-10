<?php

function dateFormate($date=null){
	$value='';
	if ($date) {
		$value=date('d M Y', strtotime($date));
	}
	return $value;
}

function getImage($folder=null,$value=null){

	$url = asset('images/no_found.png');
	$path = public_path($folder.'/'.$value);
	if (!empty($folder) && (!empty($value))) {
		if(file_exists($path)){
			$url = asset($folder.'/'.$value);
		}
	}
	return $url;
}

function deleteImage($folder=null, $file=null){

    if (!empty($folder) && !empty($file)) {
        $path = public_path($folder.'/'.$file);
        $isExists = file_exists($path);
        if ($isExists) {
            unlink($path);
        }
    }
    return true;
}




function getRole(){

	return auth()->user()->roles->pluck('name')[0] ??'';
}


function getTotalCart(){

	return count(session()->get('cart',[]));
}

function getProductInfo($product){


	$price=($product->after_discount >0) ?$product->after_discount:$product->sell_price;
	$discount_amount=$product->dicount_amount;

	return ['price'=>$price,'discount_amount'=>$discount_amount];

}
