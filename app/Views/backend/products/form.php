<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<style>
    .multi-select {
        padding: 10px;
        max-height: 200px;
        overflow-y: auto;
    }

    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tag-item {
        background-color: #f5f5f5;
        border-radius: 4px;
        padding: 5px 10px;
    }

    .tag-item label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .tag-item input[type="checkbox"] {
        margin-right: 5px;
    }

    .no-tags {
        color: #888;
        font-style: italic;
    }
</style>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= $isEdit ? base_url('backend/products/edititem') : base_url('backend/products/additem'); ?>" method="post" id="myForm">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="productId" value="<?= $product['p_id'] ?>">
                <?php endif; ?>

                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '編輯' : '新增' ?>作品</h1>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱</label>
                                    <div class="input">
                                        <input type="text" name="name" required placeholder="請輸入作品名稱" value="<?= $isEdit ? $product['p_name'] : old('name'); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>描述</label>
                                    <div class="textarea">
                                        <textarea name="description" placeholder="請輸入作品描述"><?= $isEdit ? $product['p_description'] : old('description'); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>分類</label>
                                    <div class="select">
                                        <select name="category" required>
                                            <option value="">請選擇分類</option>
                                            <?php foreach ($categories as $id => $name): ?>
                                                <option value="<?= $id ?>" <?= $isEdit && $product['p_pg_id'] == $id ? 'selected' : (old('category') == $id ? 'selected' : ''); ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>連結</label>
                                    <div class="input">
                                        <input type="text" name="link" placeholder="請輸入連結網址" value="<?= $isEdit ? $product['p_link'] : old('link'); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>排序</label>
                                    <div class="input">
                                        <input type="number" name="sort" required value="<?= $isEdit ? $product['p_sort'] : old('sort', '0'); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>標籤</label>
                                    <div class="multi-select">
                                        <?php if (empty($tags)): ?>
                                            <div class="no-tags">尚無可用標籤</div>
                                        <?php else: ?>
                                            <div class="tags-container">
                                                <?php foreach ($tags as $tag): ?>
                                                    <div class="tag-item">
                                                        <label>
                                                            <input type="checkbox" name="tags[]" value="<?= $tag['t_id'] ?>"
                                                                <?= (in_array($tag['t_id'], $selectedTags ?? [])) ? 'checked' : '' ?>>
                                                            <span><?= $tag['t_name'] ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="window.location.href='<?= base_url('backend/products') ?>'">返回</button>
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