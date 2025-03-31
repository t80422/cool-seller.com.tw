<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<?php $controller = 'Support' ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to($controller . '::' . ($isEdit ? 'edit_consultations_submit' : 'create_consultations_submit')) ?>" method="post" id="myForm">
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>產品諮詢服務</h1>

                        <?php if ($isEdit): ?>
                            <input type="hidden" name="c_Id" value="<?= $data['c_Id'] ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱</label>

                                    <div class="input">
                                        <input type="text" name="c_Name" required value="<?= old('c_Name') ?? ($data['c_Name'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>電話</label>

                                    <div class="input">
                                        <input type="tel" name="c_Phone" required value="<?= old('c_Phone') ?? ($data['c_Phone'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>分機</label>

                                    <div class="input">
                                        <input type="text" name="c_Extension" required value="<?= old('c_Extension') ?? ($data['c_Extension'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>描述</label>

                                    <div class="input">
                                        <input type="text" name="c_Description" required value="<?= old('c_Description') ?? ($data['c_Description'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>排序</label>

                                    <div class="input">
                                        <input type="number" name="c_Sequence" required value="<?= old('c_Sequence') ?? ($data['c_Sequence'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>是否顯示</label>

                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" name="c_IsShow" value="1" <?= (old('c_IsShow') ?? ($data['c_IsShow'] ?? '1')) == '1' ? 'checked' : ''; ?>>

                                            <span>是</span>
                                        </label>

                                        <label class="radio-label">
                                            <input type="radio" name="c_IsShow" value="0" <?= (old('c_IsShow') ?? ($data['c_IsShow'] ?? '1')) == '0' ? 'checked' : ''; ?>>

                                            <span>否</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to($controller . '::index_consultations') ?>'">返回</button>
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