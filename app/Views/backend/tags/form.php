<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to('Tags::' . ($isEdit ? 'edititem' : 'additem')) ?>" method="post">
                <?php if($isEdit): ?>
                    <input type="hidden" name="tagId" value="<?= $tag['t_id'] ?? ''; ?>">
                <?php endif; ?>
                
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>TAG資訊</h1>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱<span class="note">*</span></label>
                                    <div class="input">
                                        <input type="text" name="name" required value="<?= old('name') ?? ($tag['t_name'] ?? ''); ?>" placeholder="請輸入TAG名稱">
                                    </div>
                                    <?php if(isset($validation['t_name'])): ?>
                                        <div class="error"><?= $validation['t_name']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label>排序<span class="note">*</span></label>
                                    <div class="input">
                                        <input type="number" name="sort" required value="<?= old('sort') ?? ($tag['t_sort'] ?? '0'); ?>" placeholder="請輸入排序">
                                    </div>
                                    <?php if(isset($validation['t_sort'])): ?>
                                        <div class="error"><?= $validation['t_sort']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label for="enable">啟用</label>
                                    <input class="form-check-input" type="checkbox" id="enable" name="enable" value="1" <?= old('enable') ?? (isset($tag['t_enable']) ? $tag['t_enable'] == 1 : true) ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to('Tags::index') ?>'">返回</button>
                    <button class="btn-submit" type="submit">儲存</button>
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

<?php $this->endSection(); ?> 