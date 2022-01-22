<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once "vendor/autoload.php";

    header('Content-Type: application/json');

    if(isset($_REQUEST['REQUEST_METHOD']) && $_REQUEST['REQUEST_METHOD'] === 'OPTIONS'){
        http_response_code(200);
        exit(1);
    }

    $inputJSON = file_get_contents('php://input');
    $input = (!empty($inputJSON)) ? json_decode($inputJSON, TRUE) : $_POST;

    if (!isset($input['name']) && !isset($input['email'])) {
        http_response_code(400);
        echo json_encode(array('error' => 'Missing name or email address.'));
        exit(1);
    }
    
    $name = $input['name'];
    $email = $input['email'];
    $people = $input['people'];
    $message = $input['message'];
    $room_type = $input['roomType'];
    if (isset($input['breakfastDays'])) {
        $breakfast_days = (is_array($input['breakfastDays'])) ? implode(' ', $input['breakfastDays']) : $input['breakfastDays'];
    }


    $dirname = dirname(__FILE__);
    $filename = 'bookings.csv';
    $filepath = $dirname . '/' . $filename;

    if (!file_exists($filepath)) {
        $file = fopen($filepath, 'w');
        fwrite($file, "Name,Email,People,Message,RoomType,BreakfastDays\n");
        fclose($file);
    }

    $file = fopen($filepath, 'a');
    if ($file) {
        fputcsv($file, [$name, $email, $people, $message, $room_type, $breakfast_days]);
        fclose($file);
    }

    $headers = array(
        "MIME-Version" => "1.0",
        "Content-type" => "text/html;charset=UTF-8",
        "Reply-To"     => $email,
        "From"         => "From: FJ & Inge Wedding Website <website@fj-en-inge-trou.co.za>",
        "Bcc"          => "ingelizevz@gmail.com,fjlessing@gmail.com"
    );

    $emailContent = "<h3>You have a new booking from $name for 26 March 2022</h3>";
    $emailContent .= "<p style=\"padding-left:2rem\">Name: $name<br/>";
    $emailContent .= "Email: $email<br/>";
    if (!empty($people)) $emailContent .= "People: $people<br/>";
    if (!empty($room_type)) $emailContent .= "Booking Type: $room_type<br/>";
    if (!empty($breakfast_days)) $emailContent .= "Breakfast Days: " . $breakfast_days . "<br/>";
    if (!empty($message)) $emailContent .= "Message: $message</p>";

    $emailContent .= "<p>You should be able to reply to this email, or using this link: <a href=\"mailto:$email\">$email</a></p>";

    $logfilepath = $dirname . '/maillog.txt';

    try {
        mail("guestfarm@louvain.co.za", "FJ & Inge Wedding Website - New Booking", $emailContent, $headers);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(array('error' => 'Error sending email.'));
        exit(1);
    }

//    $mail = new PHPMailer(true);

//    try {
//        $mail->SMTPDebug = 3;                                 // Enable verbose debug output
////        $mail->isSMTP();
////        $mail->Host = "mail.fj-en-inge-trou.co.za";
////        $mail->SMTPAuth = true;
////        $mail->Username = "website@fj-en-inge-trou.co.za";
////        $mail->Password = "GJX_euj2jvu0guh9wkg";
////        $mail->Port = 465;
//        ob_start();
//
//        // Gmail Settings
//        $mail->isSMTP();
//        $mail->SMTPDebug = 3;
//        $mail->Debugoutput = 'html';
//        $mail->Host = "smtp.gmail.com";
//        $mail->SMTPAuth = true;
//        $mail->Username = "fjlessing@gmail.com";
//        $mail->Password = "wpcchjfpednpqwas";
//        $mail->SMTPSecure = "tls";
//        $mail->Port = 587;
//        $mail->From = "fjlessing@gmail.com";
//        $mail->FromName = "FJ & Inge Wedding Website";
//
//        // Send mail
//        $mail->From = "website@fj-en-inge-trou.co.za";
//        $mail->FromName = "FJ & Inge Wedding Website";
//
//        $mail->addAddress('me@fjlessing.co.za', 'FJ & Inge Wedding Website');
////        $mail->addAddress('guestfarm@louvain.co.za', 'Michael Wood');
//        $mail->addBCC('ingelizevz@gmail.com', 'Hotty Mc Hotpants');
//
//        $mail->addReplyTo($email, $name);
//        $mail->isHTML(true);
//        $mail->Subject = "New Booking for Lessing Wedding: $name";
//        $mail->Body = $emailContent;
//
//        $mail->send();
//        $maillog = ob_get_contents();
//        ob_end_clean();
//
//        $logfile = fopen($logfilepath, 'a');
//        if ($logfile) {
//            fputs($logfile, $maillog);
//            fclose($logfile);
//        } else {
//            throw new Exception('Could not open log file.');
//        }
//    } catch (Exception $e) {
//        echo json_encode(array('error' => $e->getMessage()));
//        exit(1);
//    }
