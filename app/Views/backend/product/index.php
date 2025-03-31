<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
  <div class="container-main">
    <!-- tool -->
    <div class="tool-wrap">
      <div class="tool-btn">
        <button class="btn-add" onClick="window.location.href='<?= url_to('Backend\Product::create'); ?>'">新增</button>
      </div>
    </div>

    <!-- list -->
    <div class="list-wrap">
      <div class="list-overflow">
        <div class="list-main">
          <div class="list-title pr-2 pl-2">
            <div class="f-2">圖示</div>
            <div class="f-1">名稱</div>
            <div class="f-1">大分類名稱</div>
            <div class="f-1">小分類名稱</div>
            <div class="f-1">排序</div>
            <div class="f-1">產品TAG</div>
            <div class="f-1">明星商品</div>
            <div class="f-1">建檔日期</div>
            <div class="f-1">操作</div>
          </div>

          <?php foreach ($datas as $data): ?>
            <div class="list-row pr-2 pl-2">
              <div class="f-2">
                <figure class="prod-img" style="background-image: url('<?= "/public/images/products/Product/" . $data->p_Image ?>');"></figure>
              </div>
              <div class="f-1"><?= $data->p_Name; ?></div>
              <div class="f-1"><?= $data->pmc_Name; ?></div>
              <div class="f-1"><?= $data->psc_Name; ?></div>
              <div class="f-1"><?= $data->p_Sequence; ?></div>
              <div class="f-1"><?= $data->p_Tag; ?></div>
              <div class="f-1">
                <input type="checkbox" disabled <?= $data->p_Star ? 'checked' : '' ?>>
              </div>
              <div class="f-1 ta-left"><?= $data->p_CreatedAt; ?></div>
              <div class="f-1">
                <button class="btn-edit" onClick="location.href='<?= url_to('Backend\Product::edit', $data->p_Id); ?>'"></button>
                <button class="btn-del" data-sn="<?= $data->p_Id; ?>"></button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- pages -->
    <?= $pager_links; ?>
  </div>

  <div class="popup-wrap js-del-popup">
    <div class="popup-main">
      <div class="popup-content">
        <p>是否確定刪除</p>
        <div class="popup-btn">
          <button class="btn-cancel">取消</button>
          <button class="btn-submit">確定</button>
        </div>
      </div>
    </div>
  </div>

  <div class="popup-overlay"></div>
  <!-- JS -->

  <script>
    function search() {
      location.href = '<?php echo url_to('Backend\ProductSC::index'); ?>' + "?keyword=" + $('input[name="keyword"]').val()
    }

    $(function() {
      var sn;
      $(document).on('click', '.btn-del', function() {
        $(".popup-overlay, .js-del-popup").fadeIn();
        sn = $(this).data('sn');
      });

      $(".popup-overlay, .popup-btn .btn-cancel").on('click', function() {
        $(".popup-overlay, .popup-wrap").fadeOut();
      });

      $(".popup-btn .btn-submit").on('click', function() {
        fetch('<?= site_url('backend/product/') ?>' + sn, {
            method: 'delete'
          })
          .then(response => {
            if (response.ok) {
              location.reload();
            }
          });
      })
    });
  </script>
</main>

<?php $this->endSection(); ?>