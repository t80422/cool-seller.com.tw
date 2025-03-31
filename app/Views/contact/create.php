<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div id="content" class="site-content site">
  <div class="page-header-wrap clearfix ind_row_parallax" style="background-color: #13314c; color: #ffffff">
    <div class="inner-banner2 clearfix" style="background-image: url(/public/images/about/bg.png)">
      <div class="container clearfix">
        <h2 class="page-title" style="color: #ffffff">聯絡我們</h2>
      </div>
    </div>
  </div>

  <div class="breadcumb-wrapper">
    <div class="container clearfix">
      <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="../index.htm" class="home">
          <span property="name">首頁</span>
        </a>
        <meta property="position" content="1" />
      </span>

      <span class="font-awe">&#xF105;</span>

      <span property="itemListElement" typeof="ListItem">
        <a property="item" typeof="WebPage" href="<?= site_url('contact/create') ?>" class="post post-page current-item" aria-current="page">
          <span property="name">聯絡我們</span>
        </a>

        <meta property="position" content="2" />
      </span>
    </div>
  </div>

  <div class="container">
    <div id="primary" class="inner_page_space">
      <div class="entry-content clearfix">
        <div class="wpb-content-wrapper">
          <div class="vc_row wpb_row vc_row-fluid core-projects touch">
            <div class="touch_bg wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner vc_custom_1634219844203">
                <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="custom-heading wpb_content_element">
                            <h2 class="heading-title">聯絡資訊</h2>
                          </div>

                          <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                              <p>
                                如您對本公司產品有任何疑問或想進一步了解，隨時歡迎您的指教，<br />
                                您可以將問題以電話、傳真或發送電子郵件給我們，我們專員將竭誠的為您服務解說，謝謝
                              </p>
                              <h6>
                                <span class="general">
                                </span>
                              </h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="vc_row wpb_row vc_inner vc_row-fluid row touch_middle">
                    <div class="open_hours wpb_column vc_column_container vc_col-sm-4">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                              <div class="touch_top-con">
                                <ul class="nav">
                                  <li class="item">
                                    <div class="media">
                                      <div class="media-left">
                                        <a href="#">
                                          <i class="fa fa-map-marker"></i><br />
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        台北市忠孝東路五段815號4樓
                                      </div>
                                    </div>
                                  </li>
                                  <li class="item">
                                    <div class="media">
                                      <div class="media-left">
                                        <a href="#">
                                          <i class="fa fa-envelope-o"></i><br />
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <a href="#">info@invax.com.tw</a><br />
                                        <a href="#">(02) 2788-5218</a>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="item">
                                    <div class="media">
                                      <div class="media-left">
                                        <a href="#">
                                          <i class="fa fa-phone"></i><br />
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        + 1800 562 2487<br />
                                        + 3215 546 8975
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="input_form wpb_column vc_column_container vc_col-sm-8">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                          </div>

                          <form
                            action="<?= site_url('contact') ?>"
                            method="post"
                            aria-label="Contact form">

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
        </div>
      </div>
      <!-- .entry-content -->
      <!-- #main -->
    </div>
    <!-- #primary -->
  </div>
</div>


<?= $this->endSection() ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.wpcf7-form');

    if (form) {
      // 阻止 CF7 事件處理
      form.addEventListener('submit', function(event) {
        // 不阻止原始提交
      }, true);

      form.classList.remove('init');

      const wpcf7Container = document.querySelector('.wpcf7');
      if (wpcf7Container) {
        wpcf7Container.id = 'wpcf7-disabled';
        if (wpcf7Container.dataset.wpcf7Id) {
          wpcf7Container.removeAttribute('data-wpcf7-id');
        }
      }

      // 確保隱藏字段不會干擾表單提交
      const hiddenFields = form.querySelectorAll('input[name^="_wpcf7"]');
      hiddenFields.forEach(function(field) {
        field.disabled = true;
      });
    }
  });
</script>