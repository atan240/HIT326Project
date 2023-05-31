<?php
require PARTIALS . "/site.header.layout.php";
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
    <form action='index.php' method='POST'>
        <input type='hidden' name='_method' value='post' />
        <label for='name'>Name</label>
        <input type='text' id='name' name='name' />
        <label for='password'>Password</label>
        <input type='password' id='password' name='password' />
        <br> <!-- Add a line break -->
        <input type='submit' value='Sign in' />
    </form>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>
