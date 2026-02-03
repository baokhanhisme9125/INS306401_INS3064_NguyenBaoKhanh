<?php
// submit.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Thu thập dữ liệu và lọc bỏ khoảng trắng dư thừa
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // 2. Basic Validation (Kiểm tra dữ liệu trống)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Vui lòng điền đầy đủ các thông tin!";
        exit;
    }

    // 3. Kiểm tra định dạng Email hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Định dạng email không hợp lệ!";
        exit;
    }

    // 4. Xử lý thành công (Xử lý dữ liệu gracefully)
    echo "<h3>Cảm ơn bạn, $name!</h3>";
    echo "<p>Chúng tôi đã nhận được tin nhắn: <i>$message</i></p>";
    echo "<p>Phản hồi sẽ được gửi đến email: <b>$email</b></p>";

} else {
    // Nếu truy cập trực tiếp file php mà không qua form
    echo "Vui lòng gửi dữ liệu từ form.";
}
?>
