<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to('Videos::' . ($isEdit ? 'edititem' : 'additem')) ?>" method="post" enctype="multipart/form-data">
                <?php if($isEdit): ?>
                    <input type="hidden" name="videoId" value="<?= $video['v_id'] ?? ''; ?>">
                <?php endif; ?>
                
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>創業教學</h1>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>標題<span class="note">*</span></label>
                                    <div class="input">
                                        <input type="text" name="title" required value="<?= old('title') ?? ($video['v_title'] ?? ''); ?>" placeholder="請輸入標題">
                                    </div>
                                    <?php if(isset($validation['v_title'])): ?>
                                        <div class="error"><?= $validation['v_title']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label>內容</label>
                                    <div class="input">
                                        <textarea name="content" rows="5" placeholder="請輸入內容"><?= old('content') ?? ($video['v_content'] ?? ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>影片連結<span class="note">*</span></label>
                                    <div class="input">
                                        <input type="text" name="url" required value="<?= old('url') ?? ($video['v_url'] ?? ''); ?>" placeholder="請輸入影片連結">
                                    </div>
                                    <?php if(isset($validation['v_url'])): ?>
                                        <div class="error"><?= $validation['v_url']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label>排序<span class="note">*</span></label>
                                    <div class="input">
                                        <input type="number" name="sort" required value="<?= old('sort') ?? ($video['v_sort'] ?? '0'); ?>" placeholder="請輸入排序">
                                    </div>
                                    <?php if(isset($validation['v_sort'])): ?>
                                        <div class="error"><?= $validation['v_sort']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-input">
                                    <label for="display">顯示</label>
                                    <input class="form-check-input" type="checkbox" id="display" name="display" value="1" <?= old('display') ?? (isset($video['v_display']) ? $video['v_display'] == 1 : true) ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to('Videos::index') ?>'">返回</button>
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