<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to('User::' . ($isEdit ? 'edititem' : 'additem')) ?>" method="post" id="myForm">
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>帳號資訊</h1>
                        <?php if ($isEdit): ?>
                            <input type="hidden" name="userId" value="<?= $user['u_id'] ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="form-content">
                        <div class="form-flex">
                            <div class="form-col">
                                <div class="form-input">
                                    <label>名稱</label>

                                    <div class="input">
                                        <input type="text" name="name" required value="<?= old('name') ?? ($user['u_name'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>帳號</label>

                                    <div class="input">
                                        <input type="text" name="account" required value="<?= old('account') ?? ($user['u_account'] ?? ''); ?>" pattern="^[A-Za-z0-9]+$">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>密碼</label>

                                    <div class="input">
                                        <input type="password" name="pwd" <?= $isEdit ? '' : 'required' ?> value="<?= old('pwd'); ?>" pattern="^[A-Za-z0-9@%^(!?=.*\d)]+$">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>確認密碼</label>

                                    <div class="input">
                                        <input type="password" name="chk-pwd" <?= $isEdit ? '' : 'required' ?> value="<?= old('chk-pwd'); ?>" pattern="^[A-Za-z0-9@%^(!?=.*\d)]+$">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label for="enabled">啟用</label>
                                    <input class="form-check-input" type="checkbox" id="enabled" name="enabled" value="1" <?= old('enabled') ?? ($user['u_enabled'] ?? 1) ? 'checked' : ''; ?>>
                                </div>

                                <div class="form-input">
                                    <label>權限</label>

                                    <div class="select">
                                        <select name="power" required id="powerSelect" <?= (!$isAdmin && $isEdit) ? 'disabled' : '' ?>>
                                            <?php $power = old('power') ?? ($user['u_power'] ?? ''); ?>
                                            <?php if ($isAdmin): ?>
                                            <option value="99" <?= $power == 99 ? 'selected' : ''; ?>>管理者</option>
                                            <?php endif; ?>
                                            <option value="0" <?= $power == 0 ? 'selected' : ''; ?>>一般使用者</option>
                                        </select>
                                        <?php if (!$isAdmin && $isEdit): ?>
                                        <input type="hidden" name="power" value="0">
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- 一般用戶權限設定區域 -->
                                <?php if($isAdmin): ?>
                                <div class="form-input" id="permissionsSection" style="display: <?= $power == 0 ? 'block' : 'none'; ?>">
                                    <label>功能權限設定</label>

                                    <div class="permission-group" style="margin-top: 10px;">
                                        <?php
                                        // 使用傳遞的用戶特定權限
                                        $permissions = $userPermissions ?? [];
                                        ?>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_account" name="permissions[]" value="account"
                                                <?= in_array('account', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_account">帳號管理</label>
                                        </div>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_videos" name="permissions[]" value="videos"
                                                <?= in_array('videos', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_videos">創業教學管理</label>
                                        </div>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_tags" name="permissions[]" value="tags"
                                                <?= in_array('tags', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_tags">TAG管理</label>
                                        </div>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_product_group" name="permissions[]" value="product_group"
                                                <?= in_array('product_group', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_product_group">作品分類管理</label>
                                        </div>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_products" name="permissions[]" value="products"
                                                <?= in_array('products', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_products">作品管理</label>
                                        </div>

                                        <div class="permission-item" style="padding: 8px; margin-bottom: 5px; border: 1px solid #eee; border-radius: 4px;">
                                            <input type="checkbox" id="perm_contact" name="permissions[]" value="contact"
                                                <?= in_array('contact', $permissions) ? 'checked' : '' ?>>
                                            <label for="perm_contact">聯絡我們管理</label>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to('User::index') ?>'">返回</button>
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

<script>
    $(function() {
        <?php if($isAdmin): ?>
        // 當選擇權限級別變化時
        $('#powerSelect').on('change', function() {
            var power = $(this).val();

            // 如果是一般使用者 (0)，顯示權限設定區
            if (power == 0) {
                $('#permissionsSection').show();
            } else {
                // 如果是管理者，隱藏權限設定區
                $('#permissionsSection').hide();
            }
        });
        <?php endif; ?>
    });
</script>

<?php $this->endSection(); ?>