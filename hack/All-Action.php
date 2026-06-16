<?php
session_start();
global $connect;
include_once('connection.php');

if (isset($_POST['register_btn'])) {


    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $department = mysqli_real_escape_string($connect, $_POST['department']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);


    $image_name = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];


    $upload_path = "upload/" . basename($image_name);


    if (empty($image_name)) {
        $image_name = "default.png";
    } else {

        move_uploaded_file($image_tmp, $upload_path);
    }


    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($connect, $check_email_query);

    if (mysqli_num_rows($check_email_run) > 0) {

        echo "<script>
                alert('Email already exists! Please use a different email or login.');
                window.location.href = 'index.php'; 
              </script>";
    } else {

        $insert_query = "INSERT INTO users (name, department, email, password, profile_image) 
                         VALUES ('$name', '$department', '$email', '$password', '$image_name')";

        $insert_run = mysqli_query($connect, $insert_query);

        if ($insert_run) {
            echo "<script>
                    alert('Registration Successful! You can now login.');
                    window.location.href = 'index.php'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Registration Failed! Something went wrong.');
                    window.location.href = 'index.php';
                  </script>";
        }
    }
}


if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $run = mysqli_query($connect, $sql);

    if (mysqli_num_rows($run) > 0) {

        $data = mysqli_fetch_assoc($run);

        if ($password === $data['password']) {

            $_SESSION['user_id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['profile_image'] = $data['profile_image'];

            header("Location: index.php");
            exit();
        } else {

            echo "<script>alert('Wrong Password');</script>";
        }
    } else {

        echo "<script>alert('Email Not Found');</script>";
    }
}


if (isset($_POST['add_category_btn'])) {

    $category_name = $_POST['category_name'];
    $category_desc = $_POST['category_description'];

    $sql = "INSERT INTO categories (category_name, description)
            VALUES ('$category_name', '$category_desc')";

    $run = mysqli_query($connect, $sql);

    if ($run) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}



// footer action

if (isset($_POST['submit_review'])) {

    $uid  = $_SESSION['user_id'];
    $desc = $_POST['feedback'];

    $sql = "INSERT INTO feedback (user_id, review)
            VALUES ('$uid', '$desc')";

    $run = mysqli_query($connect, $sql);

    if ($run) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
