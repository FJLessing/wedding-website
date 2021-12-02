<?php 
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
    $breakfast_days = (isset($input['breakfastDays']) && is_array($input['breakfastDays'])) ? implode(' ', $input['breakfastDays']) : '';


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
        "From"         => "From: FJ & Inge Wedding Website <booking@fj-en-inge-trou.co.za>",
    );

    $emailContent = "<h3>You have a new booking from $name for 26 March 2022</h3>";
    $emailContent .= "<p style=\"padding-left:2rem\">Name: $name<br/>";
    $emailContent .= "Email: $email<br/>";
    if (!empty($people)) $emailContent .= "People: $people<br/>";
    if (!empty($room_type)) $emailContent .= "Booking Type: $room_type<br/>";
    if (is_array($breakfast_days)) $emailContent .= "Breakfast Days: " . $breakfast_days . "<br/>";
    if (!empty($message)) $emailContent .= "Message: $message</p>";

    $emailContent .= "<p>You should be able to reply to this email, or using this link: <a href=\"mailto:$email\">$email</a></p>";

    mail(
        'guestfarm@louvain.co.za',
        "New Booking for Lessing Wedding: $name",
        $emailContent,
        $headers
    );