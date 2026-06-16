<?php
session_start();
include_once('connection.php');
global $connect;

if (!$connect) {
    die("Database Connection Failed");
}

// চেক করা হচ্ছে ইউজার লগইন করা আছে কিনা
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    // লগইন না থাকলে মেসেজ সহ ফিরিয়ে দেওয়া হবে
    header("Location: browse.php?msg=error&text=Please login first to buy resources.");
    exit();
}

// URL প্যারামিটার থেকে পেমেন্টের ডাটা রিসিভ করা
$resource_id = mysqli_real_escape_string($connect, $_GET['resource_id']);
$payment_id  = mysqli_real_escape_string($connect, $_GET['payment_id']);
$amount      = mysqli_real_escape_string($connect, $_GET['amount']);

if (!empty($resource_id) && !empty($payment_id)) {
    
    // ডুপ্লিকেট পেমেন্ট এন্ট্রি চেক করা
    $check_dup = mysqli_query($connect, "SELECT id FROM purchases WHERE payment_id='$payment_id'");
    
    if (mysqli_num_rows($check_dup) == 0) {
        // purchases টেবিলে পেমেন্ট সফল হিসেবে ডাটা ইনসার্ট করা হচ্ছে
        $sql = "INSERT INTO purchases (user_id, resource_id, payment_id, amount, status) 
                VALUES ('$user_id', '$resource_id', '$payment_id', '$amount', 'success')";
        
        if (mysqli_query($connect, $sql)) {
            // পেমেন্ট সফল হলে সাকসেস মেসেজ সহ মূল পাতায় রিডাইরেক্ট (এখানে ফাইলের নাম browse.php ধরা হয়েছে)
            header("Location: view_details.php?msg=success&text=Payment Successful! You can now preview and download the resource.");
            exit();
        } else {
            header("Location: view_details.php?msg=error&text=Database error while saving purchase.");
            exit();
        }
    } else {
        header("Location: view_details.php?msg=info&text=This purchase is already processed.");
        exit();
    }
} else {
    header("Location: view_details.php?msg=error&text=Invalid payment details received.");
    exit();
}
?>