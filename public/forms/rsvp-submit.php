<?php 
    header('Content-Type: application/json');

    if(isset($_REQUEST['REQUEST_METHOD']) && $_REQUEST['REQUEST_METHOD'] === 'OPTIONS'){
        http_response_code(200);
        exit(1);
    }

    $inputJSON = file_get_contents('php://input');
    $input = (!empty($inputJSON)) ? json_decode($inputJSON, TRUE) : $_POST;

    if (!isset($input['name']) || empty($input['name']) || !isset($input['attending']) || empty($input['attending'])) {
        http_response_code(400);
        echo json_encode(array('error' => 'Please make sure to include your name and let us know if you are coming!'));
        exit(1);
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
    if ($file) {
        fputcsv($file, [$name, $attending, $dietary, $notes]);
        fclose($file);
    }

    echo json_encode(['success' => true]);
    http_response_code(200);
