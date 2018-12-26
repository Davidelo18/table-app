<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>  
        <nav>
            <ul>
                <li><a href="index.php">Logowanie</a></li>
                <li><a href="register.php">Rejestracja</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="login" class="login">
            <h1>Logowanie</h1>
            <form class="forms" action="includes/login.php" method="post">
                <input type="text" name="userid" placeholder="Nazwa użytkownika">
                <input type="password" name="passid" placeholder="Hasło">
                <button type="submit" name="login-submit">Zaloguj</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; Wszelkie prawa zastrzeżone
    </footer>
</body>
</html>
