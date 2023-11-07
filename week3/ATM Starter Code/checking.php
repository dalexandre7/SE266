<?php
 
require_once "./account.php";

class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
	{
		if($this ->balance - $amount > self::OVERDRAW_LIMIT){
			return $this ->balance  - $amount; 

		}
		else 
		{
			echo "Overdrafted! Exceeds -200! "
		}
	} // end withdrawal

	//freebie. I am giving you this code.
	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Checking Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
}


// The code below runs everytime this class loads and 
// should be commented out after testing.

$checking = new CheckingAccount ('C123', 1000, '12-20-2019');
$checking->withdrawal(200);
$checking->deposit(500);

echo $checking->getAccountDetails();
echo $checking->getStartDate();
    
?>
