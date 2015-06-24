<?php

	//Include the Class File
	include_once('lib/classes/PostCodeCheckSum.php');

	//Create an instance of the class
	$chk = new PostCodeCheckSum();

	//Call the ProcessPostcode() function with the Postcode required
	//to return the checksum value.
	$checksum = $chk->ProcessPostcode('MK1 1ST');

	var_dump($checksum);