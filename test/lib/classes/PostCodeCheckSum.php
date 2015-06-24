<?php

class PostCodeCheckSum
{
	private $chksum_array = array();

	public function __construct()
	{
		$this->chksum_array[0] = array("Z","U","V","W","X","Y");
		$this->chksum_array[1] = array("5","0","1","2","3","4");
		$this->chksum_array[2] = array("B","6","7","8","9","A");
		$this->chksum_array[3] = array("H","C","D","E","F","G");
		$this->chksum_array[4] = array("N","I","J","K","L","M");
		$this->chksum_array[5] = array("T","O","P","Q","R","S");

	}

	public function ProcessPostcode($postcode)
	{
		str_replace(" ", "", $postcode);

		$pcode = str_split($postcode);

		$i = 0;

		$row = 0;
		$col = 0;
		foreach($pcode as $p)
		{
			foreach($this->chksum_array as $chk)
			{
				$check_array = in_array($p, $chk);
				if($check_array == true)
				{
					$pos = array_search($p, $chk);
					$col = $col+$pos;
					$row = $row+$i;
				}
				$i++;
			}
			$i=0;
		}
	

		$row_calc = $this->getRemainder($row);
		$col_calc = $this->getRemainder($col);

		
		return $this->getCheckSum($row_calc,$col_calc);
	}
	
	public function getCheckSum($row,$col)
	{

		$return = $this->chksum_array[$row][$col];

		return $return;
	}

	private function getRemainder($val)
	{

		  $int = $val%6;
	
		  return $int;
	}
}