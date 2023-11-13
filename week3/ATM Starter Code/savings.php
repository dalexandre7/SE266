<?php

require_once "./account.php";
 
class SavingsAccount extends Account
{

	const OVERDRAW_LIMIT = 0;

	public function withdrawal($amount) 
	{
		

		if($this ->balance - $amount > self::OVERDRAW_LIMIT){
			return $this ->balance -= $amount;   

		}
		else 
		{
			echo "Overdrafted! Account has hit 0...Your Broke hahahaha";
		}
	} //end withdrawal

	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Savings Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	} //end getAccountDetails
	
} // end Savings

// The code below runs everytime this class loads and 
// should be commented out after testing.
    
?>
