<?php 

namespace App\Services;

use Illuminate\Support\Facades\Schema;
/**
 * validates inputs and returns the sanitized outputs using regular expression
 */
class Validate
{
	
	public function alphabet($elem)
		{
			return preg_replace('/[^a-zA-Z ]/', '', strip_tags(trim($elem)));
		}

	public function alphanumeric($elem)
		{
			return preg_replace('/[^a-zA-Z0-9 @.]/', '', strip_tags(trim($elem)));
		}

	public function numeric($elem)
		{
			return preg_replace('/[^0-9+, ]/', '', strip_tags(trim($elem)));
		}

	public function filter($text)
		{
		     $filterWords = array('fuck','asshole','motherfucker', 'Madman', 'fucking', 'dump', 'retard');

		     $filterCount = sizeof($filterWords);

		     for($i=0; $i<$filterCount; $i++){

		      $text = preg_replace('/'.utf8_encode($filterWords[$i]).'/i', ' '.str_repeat('*', strlen(utf8_encode($filterWords[$i]))).' ' ,$text);
		     }
		     return $text;
		}
	public function validateAlphabetWithLength($string, $length = 5)
		{
			$verify = $this->alphabet($string);

		 	return ( strlen($verify) >= $length ) ? $verify : false;
		}

	public function validateMixWithLength($string, $length = 5)
		{
			$verify = $this->alphanumeric($string);

		 	return ( strlen($verify) >= $length ) ? $verify : false;
		}
}


