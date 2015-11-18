<?php
/**
 * Classe contendo apenas métodos estáticos para uso geral no sistem, como conversões de data, etc...
 * 
 * @author Fernando Marquardt <fernando.marquardt@gmail.com>
 * @version 0.1
 * @package System
 *
 */

class System {
	static function format_date($datetime, $format = 'd/m/Y') {
		$datetime = str_replace('/', '-', $datetime);
		
		$timestamp = strtotime($datetime);
		$date = date($format, $timestamp);
		
		return $date;
	}

	static function generate_unix_name($string, $limit = null) {
		$limit = (is_null($limit)) ? strlen($string) : $limit;
		
		$busca = true;
		for ($i = 0; $i < strlen($string); $i++) {
			$char = $string[$i];
			
			if (preg_match('/[a-zA-Z0-9-_ ]/i', $char)) {
				$j++;
				
				$unix_name .= $char;
			}
		}
		
		$unix_name = str_replace(' ', '_', $unix_name);
		$unix_name = System::remove_repeated_chars($unix_name, '_');
		
		$unix_name = substr($unix_name, 0, $limit);
		return strtolower($unix_name);
	}
	
	static function remove_repeated_chars($string, $char) {
		for ($i = 0; $i < strlen($string); $i++) {
			$ch = $string[$i];
			
			if ($ch == $string[$i - 1] && $ch == $char) {
			
			} else {
				$removed .= $ch;
			}
		}
		
		return $removed;
	}

}
?>