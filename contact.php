<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `message` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'Đã Gửi Tin Nhắn!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `message`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'Đã Gửi Tin Nhắn Thành Công!';

   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="contact">

        <h1 class="title">Liên Hệ</h1>

        <form action="" method="POST">
            <input type="text" name="name" class="box" required placeholder="Nhập Tên Của Bạn">
            <input type="email" name="email" class="box" required placeholder="Nhập Email Của Bạn">
            <input type="number" name="number" min="0" class="box" required placeholder="Nhập Số Điện Thoại Của Bạn">
            <textarea name="msg" class="box" required placeholder="Nhập Tin Nhắn Của Bạn" cols="30"
                rows="10"></textarea>
            <input type="submit" value="Gửi Tin Nhắn" class="btn" name="send">
        </form>

    </section>








    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>