<?php
require PARTIALS . "/site.header.layout.php";

session_start();
include MODELS . "/db.php";

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect the user to the home page or their profile page
    header("Location: index.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validate input (e.g., check for empty fields, enforce character limits, etc.)
    if (empty($name) || empty($password)) {
        $error = "Please enter both your name and password.";
    } else {
        // Sanitize input to prevent SQL injection
        $name = mysqli_real_escape_string($connection, $name);
        $password = mysqli_real_escape_string($connection, $password);

        // Prepare a parameterized query to prevent SQL injection
        $query = "SELECT user_id FROM users WHERE name = ? AND password = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $name, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Check if a matching user is found
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $user_id);
            mysqli_stmt_fetch($stmt);

            // Set session variables or user authentication tokens
            $_SESSION['user_id'] = $user_id;

            // Redirect the user to the home page or their profile page
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid name or password.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='POST'>
        <label for='name'>Username</label>
        <input type='text' id='name' name='name' required />
        <label for='password'>Password</label>
        <input type='password' id='password' name='password' required />
        <br>
        <input type='submit' value='Sign in' />
    </form>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>
