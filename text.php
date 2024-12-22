<?php
// register.php

// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'اسم_المستخدم', 'كلمة_المرور', 'اسم_قاعدة_البيانات');

// تحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// الحصول على البيانات من النموذج
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير كلمة المرور

// إدخال البيانات في قاعدة البيانات
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "تم تسجيل الحساب بنجاح!";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>