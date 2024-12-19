<?php

$username = $password = $confirm_password = $email = $phone_number = $dob = $qualification = "";
$username_err = $password_err = $confirm_password_err = $email_err = $phone_number_err = $dob_err = $qualification_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address.";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        }
    }

   
    if (empty(trim($_POST["phone_number"]))) {
        $phone_number_err = "Please enter your phone number.";
    } elseif (!preg_match("/^\d{10}$/", $_POST["phone_number"])) {
        $phone_number_err = "Phone number must be 10 digits.";
    } else {
        $phone_number = trim($_POST["phone_number"]);
    }

   
    if (empty(trim($_POST["dob"]))) {
        $dob_err = "Please enter your date of birth.";
    } else {
        $dob = trim($_POST["dob"]);
    }

   
    if (empty(trim($_POST["qualification"]))) {
        $qualification_err = "Please select your qualification.";
    } else {
        $qualification = trim($_POST["qualification"]);
    }

    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_number_err) && empty($dob_err) && empty($qualification_err)) {
        
        echo "Registration successful!";
    }
}
?>

<html>
<head>
    <title>PHP Registration Form</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body bgcolor="#add8e6">
    <h2> <font color="red"> <u> <center> Registration Form </font> </u> </center> </h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <label for="username"><strong> Username:</label> <br>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>">
        <span class="error"><?php echo $username_err; ?></span><br><br>

       
        <label for="email"> <strong>Email:</label> <br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $email_err; ?></span><br><br>

        
        <label><strong> Age: </strong></label><br>
        <input type="number" name="age" min="18" max="100" required><br><br>

        
        <label><strong> Phone Number: </strong></label><br>
        <input type="text" id="phone_number" name="phone_number" maxlength="10" value="<?php echo $phone_number; ?>" required>
        <span class="error"><?php echo $phone_number_err; ?></span><br><br>

       
        <label for="dob"><strong> Date of Birth: </strong></label><br>
        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
        <span class="error"><?php echo $dob_err; ?></span><br><br>

        
        <label><strong> Qualification: </strong></label><br>
        <select name="qualification" id="qualification" required>
            <option value="">Select Qualification</option>
            <option value="High School" <?php echo ($qualification == 'High School') ? 'selected' : ''; ?>>High School</option>
            <option value="Bachelor's Degree" <?php echo ($qualification == "Bachelor's Degree") ? 'selected' : ''; ?>>Bachelor's Degree</option>
            <option value="Master's Degree" <?php echo ($qualification == "Master's Degree") ? 'selected' : ''; ?>>Master's Degree</option>
            <option value="Doctorate" <?php echo ($qualification == 'Doctorate') ? 'selected' : ''; ?>>Doctorate</option>
        </select>
        <span class="error"><?php echo $qualification_err; ?></span><br><br>

        
        <label for="password"> <strong>Password:</label> <br>
        <input type="password" id="password" name="password">
        <span class="error"><?php echo $password_err; ?></span><br><br>

        
        <label for="confirm_password"><strong> Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <span class="error"><?php echo $confirm_password_err; ?></span><br><br>

        
        <button type="submit">Register</button>
    </form>
</body>
</html>

