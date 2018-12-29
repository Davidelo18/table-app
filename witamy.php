<?php 
    session_start(); 
    if(!isset($_SESSION['successRegister'])){
        header("Location: index.php");
        exit();
    } else{
        unset($_SESSION['successRegister']);
    }

    //erase the saving to the form variables
    if(isset($_SESSION['saveName'])) unset($_SESSION['saveName']);
    if(isset($_SESSION['saveEmail'])) unset($_SESSION['saveEmail']);

    //erase the error variables
    if(isset($_SESSION['nameError'])) unset($_SESSION['nameError']);
    if(isset($_SESSION['emailError'])) unset($_SESSION['emailError']);
    if(isset($_SESSION['passwdError'])) unset($_SESSION['passwdError']);
    if(isset($_SESSION['passRptError'])) unset($_SESSION['passRptError']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejestracja konta</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>  
        <nav>
            <ul>
                <li><a href="index.php">Logowanie</a></li>
                <li><a href="rejestracja.php">Rejestracja</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="register" class="register">
            <h1>Rejestracja się powiodła</h1>
            <p>Możesz już się zalogować na swoje konto</p>
        </div>
    </main>
    <footer>
        &copy; Wszelkie prawa zastrzeżone
    </footer>
</body>
</html>
