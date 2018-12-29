<?php session_start(); ?>
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
            <h1>Rejestracja</h1>
            <!-- if error occures the input will have border (error-sgn class) -->
            <!-- save the username and email if the validation was unsuccessful -->
            <form class="forms" action="includes/signup.php" method="post">
                <input <?php if(isset($_SESSION['nameError'])) echo 'class="error-sgn"' ?> type="text" value=
                    "<?php 
                        if(isset($_SESSION['saveName'])){
                            echo $_SESSION['saveName'];
                            unset($_SESSION['saveName']);
                        }  
                    ?>"
                    name="userid" placeholder="Nazwa użytkownika">
                    <?php
                        if(isset($_SESSION['nameError'])){
                            echo '<div class="error">'.$_SESSION['nameError'].'</div>';
                            unset($_SESSION['nameError']);
                        }
                    ?>
                <input <?php if(isset($_SESSION['emailError'])) echo 'class="error-sgn"' ?> type="text" value=
                    "<?php 
                        if(isset($_SESSION['saveEmail'])){
                            echo $_SESSION['saveEmail'];
                            unset($_SESSION['saveEmail']);
                        }  
                    ?>"
                    name="mailid" placeholder="E-mail">
                    <?php
                        if(isset($_SESSION['emailError'])){
                            echo '<div class="error">'.$_SESSION['emailError'].'</div>';
                            unset($_SESSION['emailError']);
                        }
                    ?>
                <input <?php if(isset($_SESSION['passwdError'])) echo 'class="error-sgn"' ?> type="password" name="passid" placeholder="Hasło">
                    <?php
                        if(isset($_SESSION['passwdError'])){
                            echo '<div class="error">'.$_SESSION['passwdError'].'</div>';
                            unset($_SESSION['passwdError']);
                        }
                    ?>
                <input type="password" <?php if(isset($_SESSION['passRptError'])) echo 'class="error-sgn"' ?> name="pass-repeat" placeholder="Powtórz hasło">
                    <?php
                        if(isset($_SESSION['passRptError'])){
                            echo '<div class="error">'.$_SESSION['passRptError'].'</div>';
                            unset($_SESSION['passRptError']);
                        }
                    ?>
                <button type="submit" name="register-submit">Zarejestruj się</button>
            </form>            
        </div>
    </main>
    <footer>
        &copy; Wszelkie prawa zastrzeżone
    </footer>
</body>
</html>
