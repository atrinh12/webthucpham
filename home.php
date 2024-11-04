<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'Đã Được Thêm Vào Danh Sách Yêu Thích!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'Đã Được Thêm Vào Giỏ Hàng!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'Đã Thêm Vào Danh Sách Yêu Thích!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Đã Được Thêm Vào Giỏ Hàng!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'Đã Thêm Vào Giỏ Hàng!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="home-bg">

        <section class="home">

            <div class="content">
                <span>"Vì sức khỏe gia đình bạn"</span>
                <h3>HƯỚNG TỚI CUỘC SỐNG KHỎE MẠNH VỚI THỰC PHẨM SẠCH</h3>
                <p>Hãy khám phá website của chúng tôi và trải nghiệm một cách tiện lợi và an toàn để mua sắm thực phẩm sạch.
                    Chúng tôi hy vọng rằng bạn sẽ tìm thấy những sản phẩm tuyệt vời và có một trải nghiệm mua sắm trực tuyến tốt nhất tại đây.
                </p>
                <a href="about.php" class="btn">Truy Cập</a>
            </div>

        </section>

    </div>

    <section class="home-category">

        <h1 class="title">Cửa Hàng Theo Thể Loại</h1>

        <div class="box-container">
            <div class="box">
                <img src="images/quangcao1.png" alt="">
                <h3>Rau Củ Quả</h3>
                <p>Loại thực phẩm quan trọng trong chế độ ăn uống hằng ngayfcuar chúng ta để tăng cường sức khỏe và duy
                    trì lối sống lành mạnh.</p>
                <a href="category.php?category=vegitables" class="btn">Rau Củ Quả</a>
            </div>

            <div class="box">
                <img src="images/quangcao2.png" alt="">
                <h3>Thịt</h3>
                <p>Nguồn cung cấp quan trọng của protein, vitamin và khoáng chất trong chế độ ăn uống của chúng ta.</p>
                <a href="category.php?category=meat" class="btn">Thịt</a>
            </div>

            <div class="box">
                <img src="images/quangcao3.png" alt="">
                <h3>Trái Cây</h3>
                <p>Là một phần quan trọng của chế độ ăn uống lành mạnh và cung cấp nhiều lợi ích cho sức khỏe.</p>
                <a href="category.php?category=fruits" class="btn">Trái Cây</a>
            </div>

            <div class="box">
                <img src="images/quangcao4.png" alt="">
                <h3>Cá</h3>
                <p>Nguồn thực phẩm quan trọng và là một phần không thể thiếu trong chế độ ăn uống của mỗi chúng ta.</p>
                <a href="category.php?category=fish" class="btn">Cá</a>
            </div>

        </div>

    </section>

    <section class="products">

        <h1 class="title">Sản Phẩm Mới Nhất</h1>

        <div class="box-container">

            <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
            <form action="" class="box" method="POST">
                <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
                <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                <div class="name"><?= $fetch_products['name']; ?></div>
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
                <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
                <input type="number" min="1" value="1" name="p_qty" class="qty">
                <input type="submit" value="Thêm Vào Danh Sách Yêu Thích" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="Thêm Vào Giỏ Hàng" class="btn" name="add_to_cart">
            </form>
            <?php
      }
   }else{
      echo '<p class="empty">Chưa Có Sản Phẩm Nào Được Thêm Vào!</p>';
   }
   ?>

        </div>

    </section>







    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>