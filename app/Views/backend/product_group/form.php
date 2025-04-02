<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= $isEdit ? base_url('backend/product_group/edititem') : base_url('backend/product_group/additem'); ?>" method="post" id="myForm">
                <?php if($isEdit): ?>
                <input type="hidden" name="groupId" value="<?= $group['pg_id'] ?>">
                <?php endif; ?>
                
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '編輯' : '新增' ?>作品分類</h1>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱</label>
                                    <div class="input">
                                        <input type="text" name="name" required placeholder="請輸入作品分類名稱" value="<?= $isEdit ? $group['pg_name'] : old('name'); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>排序</label>
                                    <div class="input">
                                        <input type="number" name="sort" required placeholder="請輸入排序數字(數字越小排序越前)" value="<?= $isEdit ? $group['pg_sort'] : old('sort', '0'); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label for="enabled">啟用</label>
                                    <input class="form-check-input" type="checkbox" id="enabled" name="enabled" value="1" <?= $isEdit ? ($group['pg_enabled'] == 1 ? 'checked' : '') : (old('enabled') !== null ? old('enabled') ? 'checked' : '' : 'checked'); ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="window.location.href='<?= base_url('backend/product_group') ?>'">返回</button>
                    <button class="btn-submit" type="submit"><?= $isEdit ? '更新' : '新增' ?></button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php if (session()->has('validation')): ?>
    <script>
        var errorMessages = [];
        <?php foreach (session('validation') as $error): ?>
            errorMessages.push("<?= $error; ?>");
        <?php endforeach; ?>
        alert(errorMessages.join("\n"));
    </script>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <script>
        alert("<?= session('error'); ?>");
    </script>
<?php endif; ?>

<?php $this->endSection(); ?> 