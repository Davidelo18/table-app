<?php
    session_start();

    if((!isset($_POST['username'])) || (!isset($_POST['passwd']))){
        header("Location: ../index.php");
        exit();
    }
    else{
        require "db.php";

        $login = $_POST['username'];
        $passwd = $_POST['passwd'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        
        $connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

        //a dbQuery variable stores a MySQL query to the database
        if($dbQuery = $connection->query(sprintf("SELECT * FROM users WHERE userName='%s'", mysqli_real_escape_string($connection, $login)))){
            $userResults = $dbQuery->num_rows; //checking if we have only 1 result

            if($userResults == 1){
                //variable userRow will store the whole row in database of one user
                //we switch it to the association array
                $userRow = $dbQuery->fetch_assoc();

                if(password_verify($passwd, $userRow['passwd'])){
                    $dbQuery->free_result();
                    header("Location: ../profil/user.php");
                } else{
                    $_SESSION['error'] = 'Nieprawidłowe hasło.';
                    header("Location: ../index.php");
                    exit();
                }
                
            } else{
                $_SESSION['error'] = 'Nieprawidłowy login lub hasło.';
                header("Location: ../index.php");
                exit();
            }
        }

        $connection->close();
    }
?>