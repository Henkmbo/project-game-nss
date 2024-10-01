<?php
include './config/config.php';

header('Content-Type: application/json');
$decodedParams = json_decode(file_get_contents('php://input'));
$response = array();


if (isset($decodedParams->scope) && !empty($decodedParams->scope)) {
    if ($decodedParams->scope == 'auth') {
        if (isset($decodedParams->action) && !empty($decodedParams->action)) {
            if ($decodedParams->action == 'login') {
                $email = $decodedParams->email;
                $password = $decodedParams->password;
                $stmt = $dbh->prepare("SELECT * FROM users WHERE userEmail = :userEmail AND userPassword = :userPassword");
                $stmt->bindParam(':userEmail', $email);  
                $stmt->bindParam(':userPassword', $password);  
                


                if ($stmt->execute()) {
                    $response['status'] = 200;
                    $response['message'] = 'Login successful';
                    $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    $response['status'] = 500;
                    $response['message'] = 'Login failed';
                }
            }
        }
    }
}

echo json_encode($response);
exit;
