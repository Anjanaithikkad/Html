<?php
$players = ["Virat Kohli", "Hardik Pandya", "MS Dhoni", "Bumrah,JJ", "Rohit Sharma", "KL Rahul", "Ravindra Jadeja"];
$positions = ["Batsman", "All-rounder", "Wicketkeeper", "Bowler", "Batsman", "Batsman", "All-rounder"];
?>

<html>
<head>
    <title>Indian Cricket Players</title>
    <style>
        table {
            margin: 0 auto;
            width: 60%; 
            border-collapse: collapse;
        }
    </style>
</head>
<body bgcolor="#2471a3">

    <h2 style="text-align:center;"> <font color="white">List of Indian Cricket Players </font> </h2>

    <table border="1">
        <tr>
            <th>Sl No.</th>
            <th>Player Name</th>
            <th>Position</th>
        </tr>
        
        <?php
        
        for ($i = 0; $i < count($players); $i++) {
            $slnum = $i + 1; 
            echo "<tr><td>$slnum</td><td>{$players[$i]}</td><td>{$positions[$i]}</td></tr>";
        }
        ?>
    </table>

</body>
</html>

