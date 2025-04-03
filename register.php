<?php
include_once 'utils/mysql.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Here you would typically check the credentials against a database
    // For demonstration purposes, we'll just check against hardcoded values
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = '$username';";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            // Redirect to the main page or dashboard
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid username or password.";
        }
        header('Location: index.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
    if (isset($error)) {
        echo "<script>alert('$error');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC-JC Company</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="root">
        <nav>
            <div id="nav-left">
                <a href="index.php">DC-JC</a>
            </div>
            <div id="nav-right">
                <?php if (!isset($_SESSION['username'])): ?>
                    <a href="login.php">
                        <div class="loginButton">Entrar</div>
                    </a>
                    <a href="register.php">
                        <div class="registerButton">Registar</div>
                    </a>
                <?php else: ?>
                    <a href="logout.php">
                        <div class="loginButton">Sair</div>
                    </a>
                <?php endif; ?>
            </div>
        </nav>
        <main id="login-form-main">
            <h1>Criar Conta</h1>
            <form action="login.php" method="POST" id="login-form">
                <div class="form-input">
                    <label for="username">Utilizador:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-input">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-input">
                    <label for="cpassword">Confirmar Senha:</label>
                    <input type="password" id="cpassword" name="cpassword" required>
                </div>
                <button type="submit">Registar</button>
            </form>
        </main>
        <footer></footer>
    </div>
</body>

</html>