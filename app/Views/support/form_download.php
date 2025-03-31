<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<?php $controller = 'Support' ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form
                action="<?= url_to($controller . '::' . ($isEdit ? 'edit_download_submit' : 'create_download_submit')) ?>"
                method="post"
                id="myForm"
                enctype="multipart/form-data">

                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>技術支援</h1>

                        <?php if ($isEdit): ?>
                            <input type="hidden" name="d_Id" value="<?= $data['d_Id'] ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱</label>

                                    <div class="input">
                                        <input type="text" name="d_Name" required value="<?= old('d_Name') ?? ($data['d_Name'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>描述</label>

                                    <div class="input">
                                        <input type="tel" name="d_Description" required value="<?= old('d_Description') ?? ($data['d_Description'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>下載類別</label>

                                    <div class="select">
                                        <select name="d_dc_Id">
                                            <option value="">請選擇類別</option>

                                            <?php if (isset($categories) && is_array($categories)): ?>
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category['dc_Id'] ?>" <?= (old('d_dc_Id') ?? ($data['d_dc_Id'] ?? '')) == $category['dc_Id'] ? 'selected' : '' ?>>
                                                        <?= $category['dc_Name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>檔案上傳</label>

                                    <input type="file" name="file" class="form-control">

                                    <?php if ($isEdit && !empty($data['d_FileName'])): ?>
                                        <p>目前檔案：<?= $data['d_FileName'] ?></p>
                                        <input type="hidden" name="d_FileName" value="<?= $data['d_FileName'] ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label>排序</label>

                                    <div class="input">
                                        <input type="number" name="d_Sequence" required value="<?= old('d_Sequence') ?? ($data['d_Sequence'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>是否顯示</label>

                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" name="d_IsShow" value="1" <?= (old('d_IsShow') ?? ($data['d_IsShow'] ?? '1')) == '1' ? 'checked' : ''; ?>>

                                            <span>是</span>
                                        </label>

                                        <label class="radio-label">
                                            <input type="radio" name="d_IsShow" value="0" <?= (old('d_IsShow') ?? ($data['d_IsShow'] ?? '1')) == '0' ? 'checked' : ''; ?>>

                                            <span>否</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to($controller . '::index_download') ?>'">返回</button>
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