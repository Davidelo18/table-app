<?php
session_start();

if(!isset($_POST['register-submit'])){
    header("Location: ../rejestracja.php");
    exit();
} 
else {
    //grab the values from the form
    $userName = $_POST['userid'];
    $userEmail = $_POST['mailid'];
    $password = $_POST['passid'];
    $passwordRepeat = $_POST['pass-repeat'];
    $accountType = "Pracownik";

    $successValidete = true; //var to check if the sign up was successful and stop script if it`s not

    //check length of user name
    if((strlen($userName)) < 5 || (strlen($userName) > 20)){
        $successValidete = false;
        $_SESSION['nameError'] = 'Nazwa użytkownika musi posiadać od 5 do 20 znaków';
        header("Location: ../rejestracja.php");
    }

    //check the characters of user name (allows only letters and numbers)
    if(ctype_alnum($userName) == false){
        $successValidete = false;
        $_SESSION['nameError'] = 'Nazwa użytkownika może składać się tylko z liter i cyfr. Nie może zawierać polskich znaków';
        header("Location: ../rejestracja.php");
    }

    //check the correctness of email address
    $emailSecure = filter_var($userEmail, FILTER_SANITIZE_EMAIL);

    if((filter_var($emailSecure, FILTER_VALIDATE_EMAIL) == false) || ($emailSecure != $userEmail)){
        $successValidete = false;
        $_SESSION['emailError'] = 'Niepoprawny adres email';
        header("Location: ../rejestracja.php");
    }

    //check the length of password
    if((strlen($password) < 6) || (strlen($password) > 22)){
        $successValidete = false;
        $_SESSION['passwdError'] = 'Hasło musi posiadać od 6 do 22 znaków';
        header("Location: ../rejestracja.php");
    }

    //check the correctness of password (repeated)
    if($password != $passwordRepeat){
        $successValidete = false;
        $_SESSION['passRptError'] = 'Podane hasła nie są identyczne';
        header("Location: ../rejestracja.php");
    }

    //hashing the password
    $passwordSecure = password_hash($password, PASSWORD_DEFAULT);

    //save the inserted data in the form
    $_SESSION['saveName'] = $userName;
    $_SESSION['saveEmail'] = $userEmail;

    //connect to database
    require 'db.php';
    mysqli_report(MYSQLI_REPORT_STRICT);

    try{
        $connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
        if(!$connection){
            throw new Exception(mysqli_connect_errno());
        } else{
            //check if email already exist
            $dbQuery = $connection->query("SELECT userID FROM users WHERE userEmail='$userEmail'");

            if(!$dbQuery) throw new Exception(); //check correctness of MySQL query

            $anyDuplicates = $dbQuery->num_rows;
            if($anyDuplicates > 0){
                $successValidete = false;
                $_SESSION['emailError'] = "Istnieje już konto o takim adresie email";
                header("Location: ../rejestracja.php");
            }
            
            //check if nickname already exist
            $userName = htmlentities($userName, ENT_QUOTES, "UTF-8");
            $dbQuery = $connection->query("SELECT userID FROM users WHERE userName='$userName'");

            if(!$dbQuery) throw new Exception(); //check correctness of MySQL query

            $anyDuplicates = $dbQuery->num_rows;
            if($anyDuplicates > 0){
                $successValidete = false;
                $_SESSION['nameError'] = "Istnieje już konto o takiej nazwie użytkownika";
                header("Location: ../rejestracja.php");
            }

            if($successValidete == true){
                if($connection->query(sprintf("INSERT INTO users VALUES (NULL, '$userName', '$userEmail', '$passwordSecure', '$accountType')", mysqli_real_escape_string($connection, $userName), mysqli_real_escape_string($connection, $userEmail)))){
                    $_SESSION['successRegister'] = true;
                    header("Location: ../witamy.php");
                } else{
                    throw new Exception();
                }
            }

            $connection->close();
        }
    }
    catch(Exception $e){
        header("Location: ../error/blad.php");
        exit();
    }
}