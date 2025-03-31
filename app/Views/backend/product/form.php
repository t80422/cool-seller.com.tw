<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
  <div class="container-main">
    <div class="form-wrap">
      <form action="<?= isset($data) ? url_to('Backend\Product::edititem') : url_to('Backend\Product::additem'); ?>" id="myForm" method="post" enctype="multipart/form-data">
        <?php if (isset($data)): ?>
          <input type="hidden" name="p_Id" value="<?= $data['p_Id'] ?>">
        <?php endif; ?>

        <div class="form-main">
          <div class="form-title">
            <h1><?= isset($data) ? '編輯產品' : '新增產品' ?></h1>
          </div>

          <div class="form-content">
            <div class="form-flex">
              <div class="form-img">
                <div class="img-upload">
                  <div class="upload">
                    <input type="file" onchange="readURL(this);" name="img" accept=".jpg , .jpeg , .png" <?= isset($data) ? '' : 'required' ?>>

                    <img id="previewImg" src="<?= isset($data) && !empty($data['p_Image']) ? base_url('public/images/products/Product/' . $data['p_Image']) : '/image/backend/imgfile.png' ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-col">
                  <div class="form-input">
                    <label>大分類名稱</label>

                    <div class="input">
                      <select name="pmc_Id" id="pmc_Id" required onchange="loadSubCategories(this.value)">
                        <option value="">請選擇</option>

                        <?php foreach ($pmcs as $pmc):  ?>
                          <option value="<?= $pmc['pmc_Id'] ?>" <?= (old('pmc_Id') ?? ($data['pmc_Id'] ?? '')) == $pmc['pmc_Id'] ? 'selected' : '' ?>>
                            <?= $pmc['pmc_Name'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-input">
                    <label for="p_Name">名稱</label>

                    <div class="input">
                      <input type="text" name="p_Name" value="<?= old('p_Name') ?? ($data['p_Name'] ?? '') ?>" required>
                    </div>
                  </div>

                  <div class="form-input">
                    <label for="p_Sequence">排序</label>

                    <div class="input">
                      <input type="number" name="p_Sequence" value="<?= old('p_Sequence') ?? ($data['p_Sequence'] ?? '') ?>" required>
                    </div>
                  </div>

                  <div class="form-input">
                    <label>明星商品</label>

                    <div class="radio-group">
                      <label class="radio-label">
                        <input type="radio" name="p_Star" value="1" <?= (old('p_Star') ?? ($data['p_Star'] ?? '0')) == '1' ? 'checked' : ''; ?>>

                        <span>是</span>
                      </label>

                      <label class="radio-label">
                        <input type="radio" name="p_Star" value="0" <?= (old('p_Star') ?? ($data['p_Star'] ?? '0')) == '0' ? 'checked' : ''; ?>>

                        <span>否</span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-col">
                  <div class="form-input">
                    <label>小分類名稱</label>

                    <div class="input">
                      <select name="p_psc_Id" id="psc_Id" required onchange="loadTags(this.value)">
                        <option value="">請先選擇大分類</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-input">
                    <label>產品標籤</label>

                    <div id="tag_container" class="checkbox-container">
                      <p>請先選擇小分類</p>
                    </div>
                  </div>
                </div>				
              </div>
			 
            </div>
			 <div class="form-input">
                    <label for="p_Description">描述</label>
                    <div class="input">
                      <textarea rows="10" cols="120" name="p_Description" required><?= old('p_Description') ?? ($data['p_Description'] ?? '') ?></textarea>
                    </div>
                  </div>
          </div>
        </div>
        <div class="form-btn">
          <button class="btn-cancel" type="button" onclick='location.href="/backend/product"'>返回</button>
          <button class="btn-submit" type="submit">儲存</button>
        </div>
      </form>
    </div>
  </div>
</main>

<script>
  $(function() {
    // 檢查是否編輯模式
    const isEditMode = <?= isset($data) ? 'true' : 'false' ?>;

    // 如果大分類已選擇，則載入對應的小分類
    let selectedPmcId = $('#pmc_Id').val();

    // 在編輯模式下確保正確設置大分類
    if (isEditMode && !selectedPmcId) {
      selectedPmcId = '<?= $data['pmc_Id'] ?? '' ?>';
      $('#pmc_Id').val(selectedPmcId);
    }

    if (selectedPmcId) {
      // 載入小分類
      loadSubCategories(selectedPmcId);
    }
  });

  // 載入小分類
  function loadSubCategories(pmcId) {
    $('#psc_Id').html('<option value="">載入中...</option>');

    $.ajax({
      url: `<?= site_url('backend/product/getSubCategories') ?>/${pmcId}`,
      type: 'get',
      success: function(response) {
        let options = '<option value="">請選擇</option>';

        if (response.success && response.subCategories && response.subCategories.length > 0) {
          response.subCategories.forEach(function(item) {
            const selected = '<?= $data['p_psc_Id'] ?? '' ?>' == item.psc_Id ? 'selected' : '';
            options += `<option value="${item.psc_Id}" ${selected}>${item.psc_Name}</option>`;
          });
        }

        $('#psc_Id').html(options);

        // 獲取設置後的值
        const selectedPscId = $('#psc_Id').val();

        // 如果有選中的小分類，載入標籤
        if (selectedPscId) {
          loadTags(selectedPscId);
        }
      },
      error: function(err) {
        alert('載入小分類失敗');
      }
    });
  }

  // 載入標籤並預先選中已有的標籤
  function loadTags(pscId, selectedTags = []) {
    $('#tag_container').html('<p>載入中...</p>');

    <?php if (isset($data) && !empty($data['p_Tag'])): ?>
      // 如果是編輯頁面，使用已有的標籤
      selectedTags = '<?= $data['p_Tag'] ?>'.split(',').map(tag => tag.trim());
    <?php endif; ?>

    $.ajax({
      url: `<?= site_url('backend/product/get-tags') ?>/${pscId}`,
      type: 'get',
      success: function(response) {
        let html = '';

        if (response.tags && response.tags.length > 0) {
          // 創建標籤選擇區域
          html = '<div class="tag-checkbox-group">';

          // 添加每個標籤的 checkbox，如果在選中陣列中則預先選中
          response.tags.forEach(function(tag) {
            const isChecked = selectedTags.includes(tag) ? 'checked' : '';

            html += `
            <label class="tag-checkbox">
              <input type="checkbox" name="p_Tag[]" value="${tag}" ${isChecked}>${tag}
            </label>
          `;
          });

          html += '</div>';
        } else {
          html = '<p>沒有可用的標籤</p><div class="tag-checkbox-group"></div>';
        }

        $('#tag_container').html(html);
      },
      error: function() {
        $('#tag_container').html('<p>載入標籤失敗</p>');
        alert('載入標籤失敗');
      }
    });
  }
</script>

<style>
  .tag-checkbox-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 5px;
  }

  .tag-checkbox {
    display: inline-flex;
    align-items: center;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .tag-checkbox:hover {
    background-color: #e9e9e9;
  }

  .tag-checkbox input[type="checkbox"] {
    margin-right: 5px;
  }

  .tag-checkbox input[type="checkbox"]:checked {
    font-weight: bold;
    color: #1a73e8;
  }

  .tag-checkbox:has(input[type="checkbox"]:checked) {
    background-color: #e6f2ff;
    border-color: #1a73e8;
  }
</style>
<?php $this->endSection(); ?>