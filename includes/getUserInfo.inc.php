<?php

    if (isSet($_SESSION['User'])){
        $id = $_SESSION['User'][0];

        $user = new UserDB($pdo);
        $person = new PersonDB($pdo);
        $payment = new PaymentInfoDB($pdo);

        $userInfo = $user->getUsernameByID($id);
        $personInfo = $person->findById($id);
        $paymentInfo = $payment->findById($id);


    }
    else{
        header("Location: LogOut.php");
    }

 ?>
