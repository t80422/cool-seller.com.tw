<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<?php $controller = 'News' ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to($controller . '::' . ($isEdit ? 'edit_submit' : 'create_submit')) ?>" method="post" id="myForm" enctype="multipart/form-data">
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>活動訊息</h1>

                        <?php if ($isEdit): ?>
                            <input type="hidden" name="a_Id" value="<?= $data['a_Id'] ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-img">
                                <div class="img-upload">
                                    <div class="upload">
                                        <input type="file" onchange="readURL(this);" name="img" accept=".jpg , .jpeg , .png" <?= isset($data) ? '' : 'required' ?>>

                                        <img id="previewImg" src="<?= isset($data) && !empty($data['a_Img']) ? base_url('public/images/news/' . $data['a_Img']) : '/image/backend/imgfile.png' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-input">
                                    <label>標題</label>

                                    <div class="input">
                                        <input type="text" name="a_Title" required value="<?= old('a_Title') ?? ($data['a_Title'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>內容</label>

                                    <div class="input">
                                        <input type="text" name="a_Content" required value="<?= old('a_Content') ?? ($data['a_Content'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>開始日期</label>

                                    <div class="input">
                                        <input type="date" name="a_StartDate" required value="<?= old('a_StartDate') ?? ($data['a_StartDate'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>結束日期</label>

                                    <div class="input">
                                        <input type="date" name="a_EndDate" required value="<?= old('a_EndDate') ?? ($data['a_EndDate'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>是否顯示</label>

                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" name="a_IsShow" value="1" <?= (old('a_IsShow') ?? ($data['a_IsShow'] ?? '1')) == '1' ? 'checked' : ''; ?>>

                                            <span>是</span>
                                        </label>

                                        <label class="radio-label">
                                            <input type="radio" name="a_IsShow" value="0" <?= (old('a_IsShow') ?? ($data['a_IsShow'] ?? '1')) == '0' ? 'checked' : ''; ?>>

                                            <span>否</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>是否置頂</label>

                                    <div class="radio-group">
                                        <label class="radio-label">
                                            <input type="radio" name="a_IsPinned" value="1" <?= (old('a_IsPinned') ?? ($data['a_IsPinned'] ?? '0')) == '1' ? 'checked' : ''; ?>>

                                            <span>是</span>
                                        </label>

                                        <label class="radio-label">
                                            <input type="radio" name="a_IsPinned" value="0" <?= (old('a_IsPinned') ?? ($data['a_IsPinned'] ?? '0')) == '0' ? 'checked' : ''; ?>>

                                            <span>否</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to($controller . '::index_backend') ?>'">返回</button>
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