<?php

$fixed_charge = 5;    
$tax_rate = 0.05;    

$units_consumed = $total_bill = $tax_amount = $net_bill = "";
$units_consumed_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    
    if (empty(trim($_POST["units_consumed"]))) 
    {
        $units_consumed_err = "Please enter the units consumed.";
    } elseif (!is_numeric($_POST["units_consumed"]) || $_POST["units_consumed"] <= 0) 
    {
        $units_consumed_err = "Please enter a valid number greater than 0.";
    } else {
        $units_consumed = trim($_POST["units_consumed"]);
        
       
        if ($units_consumed <= 50) 
        {
            $tariff_rate = 3.25;
        } elseif ($units_consumed <= 100) 
        {
            $tariff_rate = 4.05;
        } elseif ($units_consumed <= 150) 
        {
            $tariff_rate = 5.10;
        } elseif ($units_consumed <= 200) 
        {
            $tariff_rate = 6.95;
        } else {
            $tariff_rate = 7.50; 
        }
       
        $total_bill = $units_consumed * $tariff_rate;      
        $total_bill += $fixed_charge;  
        $tax_amount = $total_bill * $tax_rate;
        $net_bill = $total_bill + $tax_amount;
    }
}
?>

<html>
<head>
    <title>Electricity Bill Calculation</title>
    <style>
        .error { color: red; }
        .container { width: 50%; margin: 0 auto; text-align: center; }
        table { width: 100%; margin: 20px 0; border: 1px solid black; border-collapse: collapse; }
        td, th { padding: 10px; text-align: left; }
    </style>
</head>
<body bgcolor="#F08080">
    <div class="container">
        <h2>Electricity Bill Calculator</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="units_consumed">Enter Units Consumed:</label>
            <input type="text" id="units_consumed" name="units_consumed" value="<?php echo $units_consumed; ?>">
            <span class="error"><?php echo $units_consumed_err; ?></span><br><br>

            <button type="submit">Calculate Bill</button>
        </form>

        <?php
        if (!empty($net_bill)) 
        {            
            echo "<h3>Bill Summary</h3>";
            echo "<table>";
            echo "<tr><th>Units Consumed</th><td>" . $units_consumed . "</td></tr>";
            echo "<tr><th>Tariff Rate</th><td>₹" . number_format($tariff_rate, 2) . " per unit</td></tr>";
            echo "<tr><th>Total Before Tax</th><td>₹" . number_format($total_bill, 2) . "</td></tr>";
            echo "<tr><th>Fixed Charges</th><td>₹" . number_format($fixed_charge, 2) . "</td></tr>";
            echo "<tr><th>Tax (5%)</th><td>₹" . number_format($tax_amount, 2) . "</td></tr>";
            echo "<tr><th><strong>Total Bill</strong></th><td><strong>₹" . number_format($net_bill, 2) . "</strong></td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

