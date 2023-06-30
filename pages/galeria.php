<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_galeria.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Galería | Puño de tierra</title>
</head>

<body>
    
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <section id="galleryPrincipal">
        <h1>Galería</h1>
    </section>

    <section class="imagesGalleryGrid">
        <div class="grid-item item1">
            <a href="#image1"> <img src="../imgs/galeria/1.jpg" alt=""></a>
        </div>

        <div class="grid-item item2">
            <a href="#image2"> <img src="../imgs/galeria/2.png" alt=""></a>
        </div>

        <div class="grid-item item3">
            <a href="#image3"> <img src="../imgs/galeria/3.png" alt=""></a>
        </div>

        <div class="grid-item itemX itemX1">
            <a href="#image13"> <img src="../imgs/galeria/13.jpg" alt=""></a>
        </div>

        <div class="grid-item itemX itemX2">
            <a href="#image14"> <img src="../imgs/galeria/14.jpg" alt=""></a>
        </div>

        <div class="grid-item item4">
            <a href="#image4"> <img src="../imgs/galeria/4.JPG" alt=""></a>
        </div>

        <div class="grid-item itemX itemX3">
            <a href="#image15"> <img src="../imgs/galeria/15.jpg" alt=""></a>
        </div>

        <div class="grid-item item5">
            <a href="#image5"> <img src="../imgs/galeria/5.png" alt=""></a>
        </div>

        <div class="grid-item itemX itemX4">
            <a href="#image16"> <img src="../imgs/galeria/16.jpg" alt=""></a>
        </div>
        <div class="grid-item itemX itemX5">
            <a href="#image12"> <img src="../imgs/galeria/12.jpg" alt=""></a>
        </div>

        <div class="grid-item item6">
            <a href="#image6"> <img src="../imgs/galeria/6.jpg" alt=""></a>
        </div>

        <div class="grid-item item7">
            <a href="#image7"> <img src="../imgs/galeria/7.jpg" alt=""></a>
        </div>

        <div class="grid-item item8">
            <a href="#image8"> <img src="../imgs/galeria/8.jpg" alt=""></a>
        </div>

        <div class="grid-item itemX itemX6">
            <a href="#image11"> <img src="../imgs/galeria/11.jpg" alt=""></a>
        </div>

        <div class="grid-item item9">
            <a href="#image9"> <img src="../imgs/galeria/9.jpg" alt=""></a>
        </div>

        <div class="grid-item itemX itemX7">
            <a href="#image10"><img src="../imgs/galeria/10.jpg" alt=""></a>
        </div>
    </section>

    <article class="light-box" id="image1">
        <!-- <a href="#image" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a> -->
        <img src="../imgs/galeria/1.jpg" alt="">
        <a href="#image2" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image2">
        <a href="#image1" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/2.png" alt="">
        <a href="#image3" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image3">
        <a href="#image2" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/3.png" alt="">
        <a href="#image13" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image13">
        <a href="#image3" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/13.jpg" alt="">
        <a href="#image14" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image14">
        <a href="#image13" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/14.jpg" alt="">
        <a href="#image4" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image4">
        <a href="#image14" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/4.jpg" alt="">
        <a href="#image15" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image15">
        <a href="#image4" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/15.jpg" alt="">
        <a href="#image5" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image5">
        <a href="#image15" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/5.png" alt="">
        <a href="#image16" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image16">
        <a href="#image5" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/16.jpg" alt="">
        <a href="#image12" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image12">
        <a href="#image16" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/12.jpg" alt="">
        <a href="#image6" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image6">
        <a href="#image12" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/6.JPG" alt="">
        <a href="#image7" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image7">
        <a href="#image6" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/7.jpg" alt="">
        <a href="#image8" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image8">
        <a href="#image7" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/8.jpg" alt="">
        <a href="#image11" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image11">
        <a href="#image8" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/11.jpg" alt="">
        <a href="#image9" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image9">
        <a href="#image11" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/9.jpg" alt="">
        <a href="#image10" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a>
        <a href="#" class="close"> <b>X</b></a>
    </article>

    <article class="light-box" id="image10">
        <a href="#image9" class="back_next"> <img src="../imgs/icons/back.png" alt=""></a>
        <img src="../imgs/galeria/10.jpg" alt="">
        <!-- <a href="#image8" class="back_next"> <img src="../imgs/icons/next.png" alt=""></a> -->
        <a href="#" class="close"> <b>X</b></a>
    </article>
    <main>

    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>