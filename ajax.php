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
    } if ($decodedParams->scope == 'memory') {
        if (isset($decodedParams->action) && !empty($decodedParams->action)) {
            if ($decodedParams->action == 'getMemory') {
                // First query: Retrieve questions
                $stmt = $dbh->prepare("SELECT * FROM questions");
                if ($stmt->execute()) {
                    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                    // Second query: Retrieve answers
                    $stmt2 = $dbh->prepare("SELECT * FROM answers");
                    if ($stmt2->execute()) {
                        $answers = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        
                        // Combine both results into the response
                        $response['status'] = 200;
                        $response['message'] = 'Questions and answers retrieved';
                        $response['data']['questions'] = $questions;
                        $response['data']['answers'] = $answers;
                    } else {
                        $response['status'] = 500;
                        $response['message'] = 'Failed to retrieve answers';
                    }
                } else {
                    $response['status'] = 500;
                    $response['message'] = 'Failed to retrieve questions';
                }
            }
        }
    }
    
    
}

echo json_encode($response);
exit;
