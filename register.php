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
        <div id="register" class="register">
            <h1>Rejestracja</h1>
            <form class="forms" action="includes/register.php" method="post">
                <input type="text" name="userid" placeholder="Nazwa użytkownika">
                <input type="text" name="mailid" placeholder="E-mail">
                <input type="password" name="passid" placeholder="Hasło">
                <input type="password" name="pass-repeat" placeholder="Powtórz hasło">
                <button type="submit" name="register-submit">Rejestracja</button>
            </form>
        </div>
    </main>
    <footer>
        &copy; Wszelkie prawa zastrzeżone
    </footer>
</body>
</html>
