<?php   
require_once("../../config/dbconn.php");
require_once '../../classes/Authentication.php';
require_once '../../repositories/UserRepository.php';

$userRepository = new UserRepository($ConnStrx);
$authentication = new Authentication($userRepository, new Session());

if (isset($_POST['signup']))
{
    if (empty($_POST['firstName']) || empty($_POST['userName']) ||empty($_POST['lastName']) || empty( $_POST['emailAddress']) || empty($_POST['password'])) 
    {
        echo"Please fill in the blank fields";
    }
    else
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        $emailAddress = $_POST['emailAddress'];
        $password =$_POST['password'];
    }
    
    

    if($authentication->login($userName, $password))
    {
        echo "User already exist";
    }
    else
    {
        $user = new User($userName, $firstName, $lastName, $emailAddress);
        $result = $userRepository->addUser($user, $password);
    }
    
    if ($result)
    {
        header("location:LoginPage.php");
        
    }
    else 
    {
        echo "There is an error in your QUERY statment. Please check and try again";
    }
}
else if (isset($_POST['login'])) {
    
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    if($authentication->login($userName,$password))
    {
        if ($_SESSION['isAdmin'] == 1 && $_SESSION['isActive'] == 1)
        {
            header("Location: dashboard.php");
            exit();
        }
        else if ($_SESSION['isActive'] == 1)
        {
            header("Location: index.php?page=home");
            exit();
        }
        else
        {
            echo '<script>alert("Your account has been deactivated. Please contact the administrator.");';
            echo 'window.location.href = "logon.php";</script>';
        }
    }
    // $loginResult = checkLogin($UserName, $Password, $ConnStrx);

    // if($loginResult['authenticated'] == true)
    // {
    //     $_SESSION['user_id'] = $loginResult['user_id'];
    //     $_SESSION['username'] = $loginResult['username'];
    //     $_SESSION['fullname'] = $loginResult['fullname'];
    //     $_SESSION['isAdmin'] = $loginResult['isAdmin'];
    //     $_SESSION['isActive'] = $loginResult['isActive'];
    //     if ($_SESSION['isAdmin'] == 1 && $_SESSION['isActive'] == 1)
    //     {
    //         header("Location: dashboard.php");
    //         exit();
    //     }
    //     else if ($_SESSION['isActive'] == 1)
    //     {
    //         header("Location: index.php?page=home");
    //         exit();
    //     }
    //     else
    //     {
    //         echo '<script>alert("Your account has been deactivated. Please contact the administrator.");';
    //         echo 'window.location.href = "logon.php";</script>';
    //     }
    // }
    else
    {
        echo '<script>alert("Incorrect username or password. Please try again.");';
        echo 'window.location.href = "logon.php";</script>';
    }
}
else 
{
    header("location:index.html");
}

?>