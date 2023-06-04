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

// Check if the signup form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['role'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Perform user registration and account creation
    if (createUser($name, $password, $first_name, $last_name, $email, $role)) {
        // Set session variables or user authentication tokens
        $_SESSION['user_id'] = getUserId($name);

        // Redirect the user to the home page or their profile page
        header("Location: index.php");
        exit();
    } else {
        $error = "Failed to create the user account";
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
    <h1>Sign Up</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action='signup.php' method='POST'>
        <label for='name'>Username</label>
        <input type='text' id='name' name='name' required />
        <label for='password'>Password</label>
        <input type='password' id='password' name='password' required />
        <label for='first_name'>First Name</label>
        <input type='text' id='first_name' name='first_name' required />
        <label for='last_name'>Last Name</label>
        <input type='text' id='last_name' name='last_name' required />
        <label for='email'>Email</label>
        <input type='email' id='email' name='email' required />
        <label for='role'>Role</label>
        <select id='role' name='role' required>
            <option value='journalist'>Journalist</option>
            <option value='editor'>Editor</option>
            <option value='user'>User</option>
        </select>
        <br>
        <input type='submit' value='Sign up' />
    </form>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>
