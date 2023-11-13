
<?php
require_once "./account.php"; 
require_once "./checking.php";
require_once "./savings.php"; 




if(isset($_POST["checkingBalance"])){
   $checkingBalance  = filter_input(INPUT_POST, "checkingBalance");
   $savingsBalance  = filter_input(INPUT_POST, "savingBalance");
}
else{
    $checkingBalance = 1000; 
    $savingsBalance = 5000; 
}

$checking = new CheckingAccount ('C123', $checkingBalance, '12-20-2019');
$savings = new SavingsAccount('S123', $savingsBalance, '03-20-2020');




    if (isset ($_POST['withdrawChecking'])) 
    {
        $chewith = filter_input(INPUT_POST, "checkingWithdrawAmount");
        $checking -> withdrawal($chewith);
    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        $chedep =  filter_input(INPUT_POST, "checkingDepositAmount");
        $checking -> deposit($chedep);
    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        $with =  filter_input(INPUT_POST, "savingsWithdrawAmount");
        $savings -> withdrawal($with);
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        $saveDep =  filter_input(INPUT_POST, "savingsDepositAmount");
        $savings -> deposit($saveDep);
    } 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>

    <form method="post">
               
    <h1>ATM</h1>
        <div class="wrapper">
            
            <div class="account">
              <div>
                <?= $checking->getAccountDetails(); ?>

              </div>
                    
                    <div class="accountInner">
                        <input type='hidden' name="checkingBalance" value="<?=$checking->getBalance();?>" />
                        <input type="text" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">

            <div>
                <?= $savings->getAccountDetails(); ?>

              </div>
               
                    
                    <div class="accountInner">
                    <input type='hidden' name="savingBalance" value="<?=$savings->getBalance();?>" />
                        <input type="text" name="savingsWithdrawAmount" value="" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="savingsDepositAmount" value="" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            
            </div>
            
        </div>
    </form>
</body>
</html>
