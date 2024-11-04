<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="about">

        <div class="row">

            <div class="box">
                <img src="images/about-img-1.png" alt="">
                <h3>Tại Sao Chọn Chúng Tôi?</h3>
                <p>Chúng tôi cam kết mang đến cho bạn những sản phẩm an toàn, chất lượng cao và nguồn gốc tự nhiên.
                    Chúng tôi tuân thủ các tiêu chí vệ sinh,
                    an toàn thực phẩm và bảo vệ môi trường đồng thời hổ trợ người dân địa phương. Chúng tôi cung cấp một
                    loạt các sản phẩm thực phẩm sạch bao gồm rau củ quả, thịt, cá và trái cây.
                    Bạn có thể tìm thấy những lựa chọn phong phú để đáp ứng nhu cầu dinh dưỡng và khẩu vị của bạn.
                </p>
                <a href="contact.php" class="btn">Liên Hệ</a>
            </div>

            <div class="box">
                <img src="images/about-img-2.png" alt="">
                <h3>Những Gì Chúng Tôi Cung Cấp?</h3>
                <p>Chúng tôi cung cấp lương thực thực phẩm sạch, không chứa hóa chất độc hại, thuốc trừ sâu hay chất bảo
                    quản có hại cho sức khỏe. Nếu bạn đang quan tâm đến việc tiêu dùng thực phẩm sạch và sức khỏe. Hãy
                    liên hệ với chúng tôi
                    để biết thêm thông tin về các sản phẩm và dịch vụ mà chúng tôi cung cấp.
                </p>
                <a href="shop.php" class="btn">Cửa Hàng Của Chúng Tôi</a>
            </div>

        </div>

    </section>

    <section class="reviews">

        <h1 class="title">Đánh Giá Của Khách Hàng</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/mau5.jpg" alt="">
                <p>Tôi cảm thấy an tâm khi biết rằng những loại thực phẩm tôi mua là sạch và không chứa các hóa chất độc
                    hại. Điều này giúp tôi và gia đình có một lối sống lành mạnh hơn.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Hân Hân</h3>
            </div>

            <div class="box">
                <img src="images/mau1.jpg" alt="">
                <p>Tôi có thể tìm thấy tất cả những gì tôi cần cho chế độ ăn uống lành mạnh của mình. Điều này tiện lợi
                    và giúp cho tôi tiết kiệm được thời gian.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Lucky</h3>
            </div>

            <div class="box">
                <img src="images/mau1.jpg" alt="">
                <p>Sự tươi ngon của lương thực sạch thực sự đáng khen. Chúng có thể duy trì độ tươi lâu hơn, không bị
                    nhanh chóng hỏng như các loại thực phẩm khác.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Hương Ly</h3>
            </div>

            <div class="box">
                <img src="images/mau2.jpg" alt="">
                <p>Dịch vụ này rất thân thiện và hổ trợ nhiệt tình. Họ cung cấp cho tôi những lời khuyên quý giá về cách
                    lựa chọn và bảo quản thực phẩm sạch.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Kiều Trang</h3>
            </div>

            <div class="box">
                <img src="images/mau3.jpg" alt="">
                <p>Lương thực sạch thường được chế biến và đóng gói một cách cẩn thận và hợp vệ sinh. Điều này giúp tôi
                    tránh được những rủi ro liên quan đến việc tiếp xúc với vi khuẩn độc hại và bảo vệ sức khỏe của
                    mình.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Trang Trang</h3>
            </div>

            <div class="box">
                <img src="images/mau2.jpg" alt="">
                <p>Chất lượng sản phẩm tuyệt vời. Rau củ quả tươi ngon, thịt tươi mềm, không có chất bảo quản. Tôi hoàn
                    toàn hài lòng về chất lượng sản phẩm.
                </p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Ngọc Ánh</h3>
            </div>

        </div>

    </section>









    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>