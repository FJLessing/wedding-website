<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin','*');
    header('Access-Control-Allow-Methods','*');
    header('Access-Control-Allow-Credentials', 'true');

    if($_REQUEST['REQUEST_METHOD'] === 'OPTIONS'){
        http_response_code(200);
        exit(1);
    }

    $inputJSON = file_get_contents('php://input');
    $input = (!empty($inputJSON)) ? json_decode($inputJSON, TRUE) : $_POST;

    if (!isset($input['name']) && !isset($input['attending'])) {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'Missing name.'));
        die();
    }

    $name = $input['name'];
    $attending = $input['attending'] ?? 'no';
    $dietary = $input['dietary'] ?? 'none';
    $notes = $input['notes'] ?? '';

    $dirname = dirname(__FILE__);
    $filename = 'rsvp.csv';
    $filepath = $dirname . '/' . $filename;

    if (!file_exists($filepath)) {
        $file = fopen($filepath, 'w');
        fwrite($file, "Name,Attending,Dietary,Notes\n");
        fclose($file);
    }

    $file = fopen($filepath, 'a');
    fputcsv($file, [$name, $attending, $dietary, $notes]);
    fclose($file);

    echo json_encode(['success' => true]);