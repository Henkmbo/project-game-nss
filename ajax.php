<?php
include './config/config.php';
session_start(); // Start the session

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
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($user) {
                        // Set session variables
                        $_SESSION['userEmail'] = $user['userEmail'];
                        $_SESSION['userName'] = $user['userName'];
                
                        $response['status'] = 200;
                        $response['message'] = 'Login successful';
                        $response['data'] = $user; // Return user data in response
                    } else {
                        $response['status'] = 401;
                        $response['message'] = 'Invalid email or password';
                    }
                } else {
                    $response['status'] = 500; // Internal server error
                    $response['message'] = 'Database query failed';
                }
                
            }
        }
    }
}

echo json_encode($response);
exit;
