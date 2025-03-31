<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? config('App')->siteName ?></title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/responsive.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    /* .swiper {
  width: 600px;
  height: 300px;
} */

    .swiper {
      width: 100%;
      max-width: 1920px;
      margin: 0 auto;
      height: auto;
    }

    .swiper-slide img {
      width: 100%;
      height: 300px;
      display: block;
      object-fit: cover;
      aspect-ratio: 16/9;
    }

    /* 手機版 */
    @media screen and (max-width: 576px) {
      .swiper {
        max-width: 100%;
      }

      .swiper-button-prev,
      .swiper-button-next {
        transform: scale(0.8);
      }
    }

    /* 平板版 */
    @media screen and (min-width: 577px) and (max-width: 992px) {
      .swiper {
        max-width: 90%;
      }
    }
  </style>
</head>

<body>
  <div class="main-wrapper">
    <!-- 載入頁首 -->
    <?= $this->include('layout/header') ?>

    <!-- 主要內容區 -->
    <?= $this->renderSection('content') ?>

    <!-- 載入頁尾 -->
    <?= $this->include('layout/footer') ?>

    <!-- JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?= $this->renderSection('scripts') ?>
  </div>
</body>

</html>