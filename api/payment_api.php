<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['amount'], $data['reference'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request"
    ]);
    exit;
}

/*
 Simulate payment gateway logic
 In real life: M-Pesa / Stripe / Flutterwave
*/

$response = [
    "status" => "success",
    "transaction_id" => uniqid("TXN_"),
    "reference" => $data['reference'],
    "message" => "Payment completed successfully"
];

echo json_encode($response);
