<?php 
class Utils {
	
	public static function format_link ($link){
		if (strlen($link))
		{
			if (substr($link,0,7) != "http://"){
				return "http://".$link;
			}	
			else {
			   return $link;
			}	
		}
		return $link;
	}

	public static function format_date_to_input($date) {
		if ($date != "") {
			$d = explode("-", $date);
			return $d[1] . '/' . $d[2] . '/' . $d[0];
		}
		else return "";
	}
	
	function prepare_filters($filters) {
		$res = array();
		foreach ($filters as $name => $value) {
			$value = mysql_real_escape_string(trim($value));
			switch ($name) {
				case 'start_date' :
					$res[$name] = $this->format_date_to_db($value);
					break;
				case 'end_date' :
					$res[$name] = $this->format_date_to_db($value);
					break;
				case 'date' :
					$res[$name] = $this->format_date_to_db($value);
					break;	
				default:
					$res[$name] = $value;
					break;
			}
		}
		return $res;
	}
}
/* End of file utils.php */
/* Location: ./system/backend/libraries/login.php */