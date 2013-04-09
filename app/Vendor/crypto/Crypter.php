<?php
class Crypter {
	
	
	public static function createToken($textOrArray, $key, $alg = 'blowfish')
	{
		return urlencode(urlencode( base64_encode( Crypter::encrypt($textOrArray, $key, $alg) ) ));
	}
	
	public static function readToken($text, $key, $alg = 'blowfish')
	{
		return Crypter::decrypt( base64_decode( urldecode(urldecode( $text ) )), $key, $alg);
	}
	
	public static function encrypt($text, $key, $alg = 'blowfish')
	{	
		return Crypter::cryptare($text, $key, $alg, 1) ;
	}
	
	public static function decrypt($text, $key, $alg = 'blowfish')
	{
		return Crypter::cryptare($text, $key, $alg, 0) ;
	}

	private static function cryptare($text, $key , $alg, $crypt) 
	{ 
	    $encrypted_data=""; 
	    switch($alg) 
	    { 
	        case "3des": 
	            $td = mcrypt_module_open('tripledes', '', 'ecb', ''); 
	            break; 
	        case "cast-128": 
	            $td = mcrypt_module_open('cast-128', '', 'ecb', ''); 
	            break;    
	        case "gost": 
	            $td = mcrypt_module_open('gost', '', 'ecb', ''); 
	            break;    
	        case "rijndael-128": 
	            $td = mcrypt_module_open('rijndael-128', '', 'ecb', ''); 
	            break;        
	        case "twofish": 
	            $td = mcrypt_module_open('twofish', '', 'ecb', ''); 
	            break;    
	        case "arcfour": 
	            $td = mcrypt_module_open('arcfour', '', 'ecb', ''); 
	            break; 
	        case "cast-256": 
	            $td = mcrypt_module_open('cast-256', '', 'ecb', ''); 
	            break;    
	        case "loki97": 
	            $td = mcrypt_module_open('loki97', '', 'ecb', ''); 
	            break;        
	        case "rijndael-192": 
	            $td = mcrypt_module_open('rijndael-192', '', 'ecb', ''); 
	            break; 
	        case "saferplus": 
	            $td = mcrypt_module_open('saferplus', '', 'ecb', ''); 
	            break; 
	        case "wake": 
	            $td = mcrypt_module_open('wake', '', 'ecb', ''); 
	            break; 
	        case "blowfish-compat": 
	            $td = mcrypt_module_open('blowfish-compat', '', 'ecb', ''); 
	            break; 
	        case "des": 
	            $td = mcrypt_module_open('des', '', 'ecb', ''); 
	            break; 
	        case "rijndael-256": 
	            $td = mcrypt_module_open('rijndael-256', '', 'ecb', ''); 
	            break; 
	        case "xtea": 
	            $td = mcrypt_module_open('xtea', '', 'ecb', ''); 
	            break; 
	        case "enigma": 
	            $td = mcrypt_module_open('enigma', '', 'ecb', ''); 
	            break; 
	        case "rc2": 
	            $td = mcrypt_module_open('rc2', '', 'ecb', ''); 
	            break;    
	        default: 
	            $td = mcrypt_module_open('blowfish', '', 'ecb', ''); 
	            break;                                            
	    } 
	    
	    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND); 
	    $key = substr($key, 0, mcrypt_enc_get_key_size($td)); 
	    mcrypt_generic_init($td, $key, $iv); 
	    
	    if($crypt) 
	    { 
	        if(is_array($text)) $text = json_encode($text);
	        $encrypted_data = mcrypt_generic($td, $text);
	    } 
	    else 
	    { 
	        $encrypted_data = mdecrypt_generic($td, $text); 
	        if( substr($encrypted_data, 0, 1) == '{' || substr($encrypted_data, 0, 1) == '[' )
			$encrypted_data = json_decode(rtrim($encrypted_data, "\0"), true);
	    } 
	    
	    mcrypt_generic_deinit($td); 
	    mcrypt_module_close($td); 
	    
	    return $encrypted_data; 
      		
    }
}