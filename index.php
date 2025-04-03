<?php
include_once 'utils/mysql.php';
session_start();

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
        <main>
            <?php if (isset($_SESSION['username'])): ?>
                <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <?php else: ?>
                <h1>Bem-vindo ao DC-JC Company!</h1>
            <?php endif; ?>

            <p>Aplicação não oficial, para demonstração (Apache + PHP + MySQL).</p>
            <div style="padding-top:3rem">
                <ul>
                    <?php
                    $sql = "SELECT * FROM users;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li>" . htmlspecialchars($row['username']) . "</li>";
                        }
                    } else {
                        echo "<li>Nenhum utilizador encontrado.</li>";
                    }
                    ?>
                </ul>
            </div>
        </main>
        <footer></footer>
    </div>
</body>

</html>