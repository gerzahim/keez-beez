<?php 
/*<!-- 
<form method="post" action="https://www.paypal.com/cgi-bin/webscr" target="paypal">
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="business" value="7MYMPZ3LTTAC8">
	<input type="hidden" name="item_name" value="Red Mangrove Raw Honey">
	<input type="hidden" name="item_number" value="1-1/2lbs Jar">
	<input type="hidden" name="amount" value="9">
	<input type="hidden" name="add" value="1">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="undefined_quantity" value="1">
	<input type="hidden" name="discount_rate" value="80">
	<input type="hidden" name="on0" value="Sizes"><strong>Sizes</strong></td></tr><tr><td><select name="os0">
	<option value="1/2lb Jar">1/2lb Jar $5.00 USD</option>
	<option value="1lb Jar">1lb Jar $8.00 USD</option>
	<option value="1-1/2lbs Jar">1-1/2lbs Jar $12.00 USD</option>
	<option value="2lbs Jar">2lbs Jar $15.00 USD</option>
	<option value="6lbs Jar">6lbs Jar $35.00 USD</option>
</select>
<input type="image" src="images/add2cart.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
*/

// Prepare GET data
    $query = array();
    //$query['notify_url'] = 'ipn url';
    $query['cmd'] = '_cart';
    $query['add'] = '1';
    $query['business'] = '7MYMPZ3LTTAC8';
    $query['currency_code'] = 'USD';
    $query['item_name'] = $_REQUEST["item_name"];
    $query['undefined_quantity'] = 	1;
    
    $query['on0'] = $_REQUEST["on0"];
    $query['os0'] = $_REQUEST["os0"];
	//$query['discount_rate'] = getDiscount($_REQUEST["discountCode"]);
	$price = getPrice($_REQUEST["os0"]);
       
	$discount = getDiscount($_REQUEST["discountCode"]);
	if($discount>0){
		$price = round( $price * (100-$discount)/100, 1);
	}
        if($price >0){
	$query['amount'] = $price;
	}
    // Prepare query string
    $query_string = http_build_query($query);

    header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string);
	
	
	/**
	*<option value="Red Mangrove">Red Mangrove $12.00 USD</option>
	<option value="Sea Grape">Sea Grape $12.00 USD</option>
	<option value="Mango Blossom">Mango Blossom $12.00 USD</option>
	<option value="Black Mangrove">Black Mangrove $12.00 USD</option>
	<option value="Brazilian Pepper">Brazilian Pepper $12.00 USD</option>
	<option value="Jamaican Dogwood">Jamaican Dogwood $12.00 USD</option>
	
	1oz Propolis $10.00 USD
	
	10oz Honeycomb $12.00 USD
	
	100g Soap $8.00 USD
	
	8g Lip Balm $5.00 USD
	
	8oz Exfoliant $15.00 USD
	*/
	function getPrice($size){
		$price = 0;
		switch($size){
			case "1/2lb Jar": //1/2lb Jar $5.00 USD
				$price = 5;
				break;
			case "1lb Jar"://1lb Jar $8.00 USD
				$price = 8;
				break;	
			case "1-1/2lbs Jar"://1-1/2lbs Jar $12.00 USD
				$price = 12;
				break;	
			case "2lbs Jar"://2lbs Jar $15.00 USD
				$price = 15;
				break;	
			case "6lbs Jar"://6lbs Jar $35.00 USD
				$price = 35;
				break;	
			case "Red Mangrove"://Red Mangrove $12.00 USD
				$price = 12;
				break;	
			case "Sea Grape"://Sea Grape $12.00 USD
				$price = 12;
				break;	
			case "Mango Blossom"://Mango Blossom $12.00 USD
				$price = 12;
				break;	
			case "Black Mangrove"://Black Mangrove $12.00 USD
				$price = 12;
				break;
                        case "Brazilian Pepper"://Brazilian Pepper $12.00 USD
				$price = 12;
				break;		
    
			case "Jamaican Dogwood"://Jamaican Dogwood $12.00 USD
				$price = 12;
				break;	
			case "1oz Propolis"://1oz Propolis $10.00 USD
				$price = 10;
				break;	
			case "10oz Honeycomb"://10oz Honeycomb $12.00 USD
				$price = 12;
				break;	
			case "100g Soap"://100g Soap $8.00 USD
				$price = 8;
				break;	
			case "8g Lip Balm"://8g Lip Balm $5.00 USD
				$price = 5;
				break;	
			case "8oz Exfoliant"://8oz Exfoliant $15.00 USD
				$price = 15;
				break;	
			 
			default:// 
				$price = 0;
				break;		
		}
        return $price;
	}
	/**
		10% Discount on order Code: KBD10AIDC
		20% Discount on order Code: KBD20BIDC
		25% Discount on order Code: KBD25CIDC
		30% Discount on order Code: KBD30DIDC
		40% Discount on order Code: KBD40EIDC

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
			case "KBD40EIDC": 
				$rate = 40;
				break; 
			default: 
				$rate = 0;
				break;
		}
		return $rate;	
	}
?>
<p></p>
