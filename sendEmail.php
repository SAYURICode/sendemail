<?php
    
    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['house_name']) && isset($_POST['email'])) {
        $house_name = $_POST['house_name'];
        $house_number = $_POST['house_name'];
        $activity = $_POST['activity'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $people = $_POST['people'];
        $email = $_POST['email'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = ""; // enter your email address
        $mail->Password = ""; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $house_name, $house_name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $activity;
        $mail->Body($start, $end, $people);

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>