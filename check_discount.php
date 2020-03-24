<?php 
 
	$discount = getDiscount($_REQUEST["code"]);
	if($discount>0){
		echo "Your order will have $discount % discount.";
	}else{
echo "Invalid coupon code!";
        }
 
	
   
	/**
		10% Discount on order Code: KBD10AIDC
		20% Discount on order Code: KBD20BIDC
		25% Discount on order Code: KBD25CIDC
		30% Discount on order Code: KBD30DIDC
		100% Discount on order Code: GOCDG!

	*/
	function getDiscount($code){
		$rate = 0;
                $code = strtoupper($code);
		switch($code){
			case "KBD10AIDC":  
				$rate = 10;
				break;
			case "KBD20BIDC": 
				$rate = 20;
				break;	
			case "KBD25CIDC": 
				$rate = 25;
				break;	
			case "KBD30DIDC": 
				$rate = 30;
				break;	
			case "GOCDG!": 
				$rate = 100;
				break; 
			default: 
				$rate = 0;
				break;
		}
		return $rate;	
	}
?>
