<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<style>
.permission-container {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.permission-section {
    margin-bottom: 30px;
}

.permission-section h3 {
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #eee;
}

.permission-group {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.permission-item {
    padding: 12px;
    background-color: #f8f9fa;
    border-radius: 6px;
    border-left: 4px solid #4a90e2;
    display: flex;
    align-items: center;
}

.permission-item label {
    margin-left: 10px;
    cursor: pointer;
}

.form-select {
    width: 200px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 20px;
}

.permission-description {
    color: #666;
    font-size: 0.9em;
    margin: 5px 0 15px 0;
}

.btn-switch {
    display: inline-block;
    padding: 8px 16px;
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

.btn-switch:hover {
    background-color: #3672b9;
}
</style>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= base_url('backend/permission/save') ?>" method="post">
                <div class="form-main">
                    <div class="form-title">
                        <h1>權限管理</h1>
                    </div>

                    <div class="permission-container">
                        <!-- 功能權限設定 -->
                        <div class="permission-section">
                            <h3>功能權限設定</h3>
                            <p class="permission-description">勾選後可使用該功能，並在導航列中顯示</p>
                            <div class="permission-group">
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_account" name="permissions[]" value="account" 
                                        <?= in_array('account', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_account">帳號管理</label>
                                </div>
                                
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_videos" name="permissions[]" value="videos"
                                        <?= in_array('videos', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_videos">創業教學管理</label>
                                </div>
                                
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_tags" name="permissions[]" value="tags"
                                        <?= in_array('tags', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_tags">TAG管理</label>
                                </div>
                                
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_product_group" name="permissions[]" value="product_group"
                                        <?= in_array('product_group', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_product_group">作品分類管理</label>
                                </div>
                                
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_products" name="permissions[]" value="products"
                                        <?= in_array('products', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_products">作品管理</label>
                                </div>
                                
                                <div class="permission-item">
                                    <input type="checkbox" id="perm_contact" name="permissions[]" value="contact"
                                        <?= in_array('contact', $permissions) ? 'checked' : '' ?>>
                                    <label for="perm_contact">聯絡我們管理</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button type="submit" class="btn-submit">儲存設定</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
// 不需要任何特殊處理
</script>

<?php $this->endSection(); ?> 