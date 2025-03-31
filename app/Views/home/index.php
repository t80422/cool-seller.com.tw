<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
 <style>
  .swiper {
      width: 100%;
      height: 300px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
 </style>	
<div id="content" class="site-content site">
  <div class="container">
    <div id="primary" class=" ">
      <div class="entry-content clearfix">
        <div class="wpb-content-wrapper">
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            data-vc-stretch-content="true"
            class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <div class="swiper mySwiper">
						<div class="swiper-wrapper">
						<?php foreach ($banners as $banner): ?>
						  <div class="swiper-slide"><img src="/public/images/banners/<?php echo $banner["b_FileName"];?>"></div>						  
						  <?php endforeach; ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-pagination"></div>
					  </div>
                      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

					  <!-- Initialize Swiper -->
					  <script>
						var swiper = new Swiper(".mySwiper", {
						  spaceBetween: 30,
						  centeredSlides: true,
						  autoplay: {
							delay: 2500,
							disableOnInteraction: false,
						  },
						  pagination: {
							el: ".swiper-pagination",
							clickable: true,
						  },
						  navigation: {
							nextEl: ".swiper-button-next",
							prevEl: ".swiper-button-prev",
						  },
						});
					  </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            class="vc_row wpb_row vc_row-fluid diff-offer-wrapper pad-bot-offer vc_custom_1629088961697">
            <div class="wpb_column vc_column_container vc_col-sm-2">
              <div class="vc_column-inner">
                <div class="wpb_wrapper"></div>
              </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-8">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div
                    class="wpb_text_column wpb_content_element vc_custom_1629088762752 orange_sub_title">
                    <div class="wpb_wrapper">
                      <div class="sub_left_line"></div>
                      <div class="sub_center_text">我們在做什麼</div>
                      <div class="sub_right_line"></div>
                    </div>
                  </div>
                  <div
                    class="vc_custom_heading hm_main_title vc_custom_1630401411829">
                    <h1
                      style="
                            font-size: 48px;
                            color: #242424;
                            line-height: 1.2;
                            text-align: center;
                          ">
                      我們提供的產品
                    </h1>
                  </div>
                  <div class="vc_custom_heading vc_custom_1630502729197">
                    <p
                      style="
                            font-size: 16px;
                            color: #6c6c6c;
                            line-height: 1.7;
                            text-align: center;
                            font-family: Open Sans;
                            font-weight: 400;
                            font-style: normal;
                          ">
                      Duis aute irure dolor in reprehenderit in voluptate
                      velit esse cillum dolore eu fugiat nulla pariatur.
                      Excepteur sint occaecat cupidatat non proident, sunt
                      in culpa qui officia deserunt mollit anim id est .
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-2">
              <div class="vc_column-inner">
                <div class="wpb_wrapper"></div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            class="vc_row wpb_row vc_row-fluid diff-offer-wrapper srvice_grid_responsive vc_custom_1630999843644">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="child-page-wrapper">
                    <div class="service_grid_two">
                      <div class="grid-wrapper grid-3-columns grid-row">
                        <div class="row">
                          <?php foreach ($pmcs as $pmc): ?>
                            <div class="grid-sm-6 grid-md-4 service-info">
                              <div class="item">
                                <a href="products/index_sub/<?= $pmc['pmc_Id'] ?>" class="post-image view image_hover">
                                  <img
                                    decoding="async"
                                    width="360"
                                    height="202"
                                    src="/public/images/products/MainCategories/<?= $pmc['pmc_ImageFile'] ?>"
                                    class="zoom_img_effect wp-post-image"
                                    alt=""
                                    style="object-fit: cover; width: 100%; height: 202px;" />
                                </a>

                                <div class="grid_two_service_content">
                                  <a href="products/index_sub/<?= $pmc['pmc_Id'] ?>">
                                    <h4><?= $pmc['pmc_Name'] ?></h4>
                                  </a>

                                  <?php
                                  $desc = isset($pmc['pmc_Desc']) ? mb_substr($pmc['pmc_Desc'], 0, 20) : '';

                                  if (strlen($pmc['pmc_Desc']) > 20) {
                                    $desc .= '...';
                                  }
                                  ?>

                                  <p><?= $desc ?></p>

                                  <h6>
                                    <a href="products/index_sub/<?= $pmc['pmc_Id'] ?>">閱讀更多</a>
                                  </h6>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="vc_row-full-width vc_clearfix"></div>

          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            class="vc_row wpb_row vc_row-fluid ind-common-pad2 features_responsive vc_custom_1634363665720">
            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill">
              <div class="vc_column-inner vc_custom_1630557628299">
                <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element vc_custom_1630557637043 orange_sub_title">
                    <div class="wpb_wrapper">
                      <div class="sub_left_line"></div>
                      <div class="sub_center_text">我們的核心特色</div>
                      <div class="sub_right_line"></div>
                    </div>
                  </div>

                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <div class="quality-wrapper text-center">
                        <div class="vision tab-panel fade in">
                          <h2>符合國家和國際法規和標準的高水準品質控制</h2>
                          <p class="sec-vis-pad">
                            英碩公司的代理及製造產品，<br />
                            普遍地被使用於電腦資訊、通信、電力、自動控制、
                            機械、軍事設備及交通運輸設備機電系統、有效地支援國內各產業或技術單位，<br />
                            提升技術水準，共同創造世界性的兢爭力。<br /><br />
                            專業的服務，是科技及技術性產品的重要關鍵，尤其以IT市場尤為快速<br />
                            敏銳，英碩科技秉持引進先進高品質的產品及專業的技術能力與客戶共同創造國內最新產品設計亦創造業績持續成長的佳績
                          </p>
                        </div>
                        <div class="vision-wrapper text-center">
                          <ul>
                            <li>
                              <a class="cursor-hov"><img
                                  loading="lazy"
                                  decoding="async"
                                  class="alignnone size-full wp-image-466"
                                  src="/public/images/home/container_icon_01.png"
                                  alt=""
                                  width="64"
                                  height="64" /></a>
                              <p class="none">想像</p>
                            </li>
                            <li>
                              <a class="cursor-hov"><img
                                  loading="lazy"
                                  decoding="async"
                                  class="alignnone size-full wp-image-467"
                                  src="/public/images/home/container_icon_02.png"
                                  alt=""
                                  width="64"
                                  height="64" /></a>
                              <p class="none">價值觀</p>
                            </li>
                            <li>
                              <a class="cursor-hov"><img
                                  loading="lazy"
                                  decoding="async"
                                  class="alignnone size-full wp-image-468"
                                  src="/public/images/home/container_icon_03.png"
                                  alt=""
                                  width="64"
                                  height="64" /></a>
                              <p class="none">使命</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>

          <div class="vc_row-full-width vc_clearfix"></div>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            data-vc-stretch-content="true"
            class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <section class="looking-wrapper clearfix">
                        <div class="container">
                          <div class="row">
                            <div
                              class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                              <div class="indurial-solution-text2">
                                <h2>
                                  <strong>尋找適合您公司的解決方案</strong>
                                </h2>
                              </div>
                            </div>
                            <div
                              class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-right">
                              <div class="req-button text-right">
                                <a class="submit" href="contact">聯絡我們</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="vc_row-full-width vc_clearfix"></div>

          <section class="vc_section vc_custom_1630993121063">
            <div
              data-vc-full-width="true"
              data-vc-full-width-init="false"
              class="vc_row wpb_row vc_row-fluid latest-news1 vc_custom_1630993128378">
              <div
                class="home-res-about wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner">
                  <div class="wpb_wrapper">
                    <div
                      class="wpb_text_column wpb_content_element vc_custom_1630401165630 orange_sub_title left_arrange">
                      <div class="wpb_wrapper">
                        <div class="sub_left_line"></div>
                        <div
                          class="sub_center_text"
                          style="text-align: left">
                          About us
                        </div>
                      </div>
                    </div>
                    <div
                      class="vc_custom_heading hm_main_title vc_custom_1630407270357">
                      <h1
                        style="
                              font-size: 48px;
                              color: #242424;
                              line-height: 1.2;
                              text-align: left;
                            ">
                        我們引領業界 <br />自1990年
                      </h1>
                    </div>
                    <div class="wpb_text_column wpb_content_element">
                      <div class="wpb_wrapper">
                        <div class="about-sec-content">
                          <p>
                            Tdolor sit amet, consectetur, adipis civelit sed
                            quia non qui dolorem ipsum quia dolor sit amet,
                            consectetur, adipis civelit. Red quia numquam.
                          </p>
                          <div class="row">
                            <div class="col-md-6">
                              <ul>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  我們公司的成長
                                </li>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  1000 名就業人員
                                </li>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  全球產品製造
                                </li>
                              </ul>
                            </div>
                            <div class="col-md-6">
                              <ul>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  我們公司的成長
                                </li>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  客戶關係
                                </li>
                                <li>
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    class="alignnone size-full wp-image-746"
                                    src="wp-content/uploads/2021/09/img_1.png"
                                    alt=""
                                    width="20"
                                    height="18" />
                                  全球穩定合作夥伴
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner vc_custom_1630993054684">
                  <div class="wpb_wrapper">
                    <div
                      class="wpb_text_column wpb_content_element vc_custom_1630407063090 orange_sub_title left_arrange">
                      <div class="wpb_wrapper">
                        <div class="sub_left_line"></div>
                        <div
                          class="sub_center_text"
                          style="text-align: left">
                          FAQ
                        </div>
                      </div>
                    </div>
                    <div
                      class="vc_custom_heading hm_main_title vc_custom_1630413750140">
                      <h1
                        style="
                              font-size: 48px;
                              color: #242424;
                              line-height: 1.2;
                              text-align: left;
                            ">
                        問題
                      </h1>
                    </div>
                    <div class="vc_tta-container" data-vc-action="collapse">
                      <div
                        class="vc_general vc_tta vc_tta-accordion vc_tta-color-white vc_tta-style-classic vc_tta-shape-square vc_tta-o-shape-group vc_tta-controls-align-default hm1_accordion vc_custom_1630993061833">
                        <div class="vc_tta-panels-container">
                          <div class="vc_tta-panels">
                            <div
                              class="vc_tta-panel vc_active"
                              id="1630407127752-53b1a9b7-aa4d"
                              data-vc-content=".vc_tta-panel-body">
                              <div class="vc_tta-panel-heading">
                                <h4
                                  class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                  <a
                                    href="#1630407127752-53b1a9b7-aa4d"
                                    data-vc-accordion=""
                                    data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">我們為客戶提供奢華的服務</span><i
                                      class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                </h4>
                              </div>
                              <div class="vc_tta-panel-body">
                                <div
                                  class="wpb_text_column wpb_content_element">
                                  <div class="wpb_wrapper">
                                    <p>
                                      Nemo enim ipsam voluptatem quia
                                      voluptas sit aspernatur aut odit aut
                                      fugit, sed quia consequuntur magni
                                      dolores eos qui ratione voluptatem
                                      sequi nesciunt.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="vc_tta-panel"
                              id="1630407214655-926edbba-4224"
                              data-vc-content=".vc_tta-panel-body">
                              <div class="vc_tta-panel-heading">
                                <h4
                                  class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                  <a
                                    href="#1630407214655-926edbba-4224"
                                    data-vc-accordion=""
                                    data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">We offer luxury service to our
                                      customer</span><i
                                      class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                </h4>
                              </div>
                              <div class="vc_tta-panel-body">
                                <div
                                  class="wpb_text_column wpb_content_element">
                                  <div class="wpb_wrapper">
                                    <p>
                                      Nemo enim ipsam voluptatem quia
                                      voluptas sit aspernatur aut odit aut
                                      fugit, sed quia consequuntur magni
                                      dolores eos qui ratione voluptatem
                                      sequi nesciunt.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div
                              class="vc_tta-panel"
                              id="1630407223187-acf2e4f6-b0b9"
                              data-vc-content=".vc_tta-panel-body">
                              <div class="vc_tta-panel-heading">
                                <h4
                                  class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                  <a
                                    href="#1630407223187-acf2e4f6-b0b9"
                                    data-vc-accordion=""
                                    data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">We offer luxury service to our
                                      customer</span><i
                                      class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a>
                                </h4>
                              </div>
                              <div class="vc_tta-panel-body">
                                <div
                                  class="wpb_text_column wpb_content_element">
                                  <div class="wpb_wrapper">
                                    <p>
                                      Nemo enim ipsam voluptatem quia
                                      voluptas sit aspernatur aut odit aut
                                      fugit, sed quia consequuntur magni
                                      dolores eos qui ratione voluptatem
                                      sequi nesciunt.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
          </section>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            data-vc-stretch-content="true"
            class="vc_row wpb_row vc_row-fluid our-galler-htwo clearfix vc_custom_1630558559420 vc_row-no-padding">
            <div
              class="home-pro-slide wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div
                    class="wpb_text_column wpb_content_element vc_custom_1630413840805 orange_sub_title">
                    <div class="wpb_wrapper">
                      <div class="sub_left_line"></div>
                      <div class="sub_center_text">Work We Have Done</div>
                      <div class="sub_right_line"></div>
                    </div>
                  </div>
                  <div
                    class="vc_custom_heading hm_main_title vc_custom_1630413975559">
                    <h1
                      style="
                            font-size: 48px;
                            color: #000000;
                            line-height: 1.2;
                            text-align: center;
                          ">
                      我們的項目
                    </h1>
                  </div>
                  <div class="child-page-wrapper">
                    <script type="text/javascript">
                      jQuery(document).ready(function() {
                        "use strict";
                        jQuery(".carousel-wrapper-67a9755f44714").slick({
                          rtl: false,
                          slidesToShow: 4,
                          autoplay: false,
                          autoplaySpeed: 3000,
                          speed: 300,
                          slidesToScroll: 1,
                          draggable: false,
                          prevArrow: "<span class='carousel-prev crousl-pro-lft'><i class='fa fa-angle-left'></i></span>",
                          nextArrow: "<span class='carousel-next crousl-pro-rgt'><i class='fa fa-angle-right'></i></span>",
                          responsive: [{
                              breakpoint: 1024,
                              settings: {
                                slidesToShow: 4,
                              },
                            },
                            {
                              breakpoint: 801,
                              settings: {
                                slidesToShow: 2,
                              },
                            },
                            {
                              breakpoint: 600,
                              settings: {
                                slidesToShow: 2,
                              },
                            },
                            {
                              breakpoint: 480,
                              settings: {
                                slidesToShow: 1,
                              },
                            },
                          ],
                        });
                      });
                    </script>

                    <div class="grid-wrapper grid-4-columns carousel-wrapper-67a9755f44714 fullwidth-silder">
                      <?php foreach ($products as $product): ?>
                        <div class="fullwidth-slider grid-sm-6 grid-md-3">
                          <div class="item">
                            <div class="img-holder">
                              <a href="products\detail\<?= $product['p_Id'] ?>" class="tt-gallery-1">
                                <span class="tt-gallery-1-overlay"></span>

                                <div class="project-post-image image_hover">
                                  <img
                                    loading="lazy"
                                    decoding="async"
                                    width="451"
                                    height="304"
                                    src="public\images\products\Product\<?= $product['p_Image'] ?>"
                                    class="zoom_img_effect wp-post-image"
                                    sizes="auto, (max-width: 451px) 100vw, 451px" />
                                  <span class="tt-gallery-1-caption">
                                    <span class="tt-gallery-1-caption-table">
                                      <span class="tt-gallery-1-caption-inner">
                                        <span class="tt-gallery-1-search">
                                          <i class="fa fa-search"></i>
                                        </span>
                                      </span>
                                    </span>
                                  </span>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>
          <div class="vc_row wpb_row vc_row-fluid sectpad-sec">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div
                    class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1630558570987">
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner vc_custom_1630479658907">
                        <div class="wpb_wrapper">
                          <div
                            class="wpb_text_column wpb_content_element vc_custom_1630479429288 orange_sub_title left_arrange">
                            <div class="wpb_wrapper">
                              <div class="sub_left_line"></div>
                              <div
                                class="sub_center_text"
                                style="text-align: left">
                                Current Affairs
                              </div>
                            </div>
                          </div>
                          <div
                            class="vc_custom_heading hm_main_title vc_custom_1630479403090">
                            <h1
                              style="
                                    font-size: 48px;
                                    color: #242424;
                                    line-height: 1.2;
                                    text-align: left;
                                  ">
                              活動訊息
                            </h1>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="child-page-wrapper recent-news-wrapper">
                    <div class="row event-pad">
                      <?php foreach ($news as $new): ?>
                        <div class="latest-news-padd grid-sm-6 grid-md-4">
                          <div class="news-evn-img">
                            <a href="news\detail\<?= $new['a_Id'] ?>" class="image_hover">
                              <img
                                loading="lazy"
                                decoding="async"
                                width="360"
                                height="193"
                                src="/public/images/home/img.png"
                                class="img-responsive zoom_img_effect wp-post-image" />
                            </a>
                          </div>

                          <div class="news-evn-cont">
                            <?php
                            $date = new DateTime($new['a_StartDate']);
                            $day = $date->format('d');
                            $month = $date->format('M');
                            ?>

                            <div class="event-date">
                              <h3><?= $day ?> <small><?= $month ?></small></h3>
                            </div>

                            <div class="news-meta">
                              <a href="surprising-reason-college-tuition-crazy-expensive-3/index.htm">主題</a>
                            </div>

                            <a href="surprising-reason-college-tuition-crazy-expensive-3/index.htm">
                              <h3>
                                <?= $new['a_Title'] ?>
                              </h3>
                            </a>

                            <a
                              class="news_readmore"
                              href="news\detail\<?= $new['a_Id'] ?>">查看更多</a>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            data-vc-stretch-content="true"
            class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <section class="our-sol-wrapper clearfix">
                        <div class="container clearfix">
                          <p class="none">
                            我們為永續進步提供創新的
                            <span class="none">產品解決方案。<br /> </span>
                            我們的專業團隊致力於提高生產力<br />
                            <span class="light_none">和成本市場上的有效性。</span>
                          </p>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>
          <div
            data-vc-full-width="true"
            data-vc-full-width-init="false"
            class="vc_row wpb_row vc_row-fluid clearfix ind-common-pad">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div
                      class="our-t-client wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div
                            class="wpb_text_column wpb_content_element vc_custom_1630481037762 orange_sub_title left_arrange">
                            <div class="wpb_wrapper">
                              <div class="sub_left_line"></div>
                              <div
                                class="sub_center_text"
                                style="text-align: left">
                                We Work Globally
                              </div>
                            </div>
                          </div>
                          <div
                            class="vc_custom_heading hm_main_title vc_custom_1630481067149">
                            <h1
                              style="
                                    font-size: 48px;
                                    color: #242424;
                                    line-height: 1.2;
                                    text-align: left;
                                  ">
                              我們的客戶
                            </h1>
                          </div>
                          <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                              <p class="none">
                                Neque porro quisquam est, qui dolorem ipsum
                                quia dolor sit amet, consectetur, adipis
                                civelit sed quia non qui dolorem ipsum quia
                                dolor sit amet, consectetur, adipis civelit.
                                Red quia numquam eius modi.
                              </p>
                            </div>
                          </div>

                          <div class="child-page-wrapper">
                            <div
                              class="grid-wrapper grid-3-columns grid-row">
                              <div class="our-team-page">
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="168"
                                          height="123"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt="" />
                                        <a
                                          href="clients/videolab/index.htm"
                                          title="Videolab"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="170"
                                          height="131"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt=""
                                          srcset="
                                                /public/images/home/globally_logo.png            170w,
                                                wp-content/uploads/2017/02/1-2-110x84.jpg 110w
                                              "
                                          sizes="auto, (max-width: 170px) 100vw, 170px" />
                                        <a
                                          href="clients/coffee/index.htm"
                                          title="Coffee"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="170"
                                          height="131"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt=""
                                          srcset="
                                                /public/images/home/globally_logo.png            170w,
                                                wp-content/uploads/2017/02/3-1-110x84.jpg 110w
                                              "
                                          sizes="auto, (max-width: 170px) 100vw, 170px" />
                                        <a
                                          href="clients/mountainbike/index.htm"
                                          title="Mountainbike"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="170"
                                          height="131"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt=""
                                          srcset="
                                                /public/images/home/globally_logo.png            170w,
                                                wp-content/uploads/2017/02/6-1-110x84.jpg 110w
                                              "
                                          sizes="auto, (max-width: 170px) 100vw, 170px" />
                                        <a
                                          href="clients/mountain/index.htm"
                                          title="Mountain"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="170"
                                          height="131"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt=""
                                          srcset="
                                                /public/images/home/globally_logo.png            170w,
                                                wp-content/uploads/2017/02/4-1-110x84.jpg 110w
                                              "
                                          sizes="auto, (max-width: 170px) 100vw, 170px" />
                                        <a
                                          href="clients/chocolate/index.htm"
                                          title="Chocolate"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div
                                  class="our-pro-slider grid-sm-6 grid-md-4">
                                  <div class="pro-sliders">
                                    <div class="item item-client">
                                      <div class="post-image our-t-client">
                                        <img
                                          loading="lazy"
                                          decoding="async"
                                          width="170"
                                          height="131"
                                          src="/public/images/home/globally_logo.png"
                                          class="attachment-medium-thumb size-medium-thumb wp-post-image"
                                          alt=""
                                          srcset="
                                                /public/images/home/globally_logo.png            170w,
                                                wp-content/uploads/2017/02/5-1-110x84.jpg 110w
                                              "
                                          sizes="auto, (max-width: 170px) 100vw, 170px" />
                                        <a
                                          href="clients/market/index.htm"
                                          title="Market"><span class="arrows"><span></span></span></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="resp-home wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div
                            class="wpb_text_column wpb_content_element vc_custom_1630481053036 orange_sub_title left_arrange">
                            <div class="wpb_wrapper">
                              <div class="sub_left_line"></div>
                              <div
                                class="sub_center_text"
                                style="text-align: left">
                                Contact Us
                              </div>
                            </div>
                          </div>
                          <div
                            class="vc_custom_heading hm_main_title vc_custom_1630481082469">
                            <h1
                              style="
                                    font-size: 48px;
                                    color: #242424;
                                    line-height: 1.2;
                                    text-align: left;
                                  ">
                              跟我們聯絡
                            </h1>
                          </div>
                          <form action="<?= site_url('contact') ?>" method="post" aria-label="Contact form">
                            <?= csrf_field() ?>

                            <p>
                              <span class="wpcf7-form-control-wrap" data-name="name">
                                <input
                                  size="40"
                                  maxlength="400"
                                  class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                  placeholder="姓名"
                                  value="<?= old('name') ?>"
                                  type="text"
                                  name="name"
                                  required />
                              </span>

                              <br />

                              <span class="wpcf7-form-control-wrap" data-name="email">
                                <input
                                  size="40"
                                  maxlength="400"
                                  class="form-control"
                                  placeholder="信箱"
                                  value="<?= old('email') ?>"
                                  type="email"
                                  name="email"
                                  required />
                              </span>

                              <br />

                              <span class="wpcf7-form-control-wrap" data-name="subject">
                                <input
                                  size="40"
                                  maxlength="400"
                                  class="wpcf7-form-control wpcf7-text form-control"
                                  placeholder="標題"
                                  value="<?= old('subject') ?>"
                                  type="text"
                                  name="subject"
                                  required />
                              </span>

                              <br />

                              <span class="wpcf7-form-control-wrap" data-name="message">
                                <textarea
                                  cols="40"
                                  rows="10"
                                  maxlength="2000"
                                  class="wpcf7-form-control wpcf7-textarea form-control"
                                  placeholder="內容"
                                  name="message"
                                  required><?= old('message') ?></textarea>
                              </span>
                            </p>

                            <div class="row m0">
                              <p>
                                <input
                                  class="wpcf7-form-control wpcf7-submit has-spinner btn btn-default submit"
                                  type="submit"
                                  value="送出" />
                              </p>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vc_row-full-width vc_clearfix"></div>
          <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner">
                <div class="wpb_wrapper">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>