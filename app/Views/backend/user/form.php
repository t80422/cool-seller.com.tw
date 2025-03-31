<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

<main class="container-wrap">
    <div class="container-main">
        <div class="form-wrap">
            <form action="<?= url_to('Backend\User::' . ($isEdit ? 'edititem' : 'additem')) ?>" method="post" id="myForm">
                <div class="form-main">
                    <div class="form-title">
                        <h1><?= $isEdit ? '修改' : '新增' ?>帳號資訊</h1>
                        <?php if ($isEdit): ?>
                            <input type="hidden" name="userId" value="<?= $user['u_sn'] ?>" />
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
                                    <label for="">信箱</label>

                                    <div class="input">
                                        <input type="email" name="email" required value="<?= old('email') ?? ($user['u_email'] ?? ''); ?>">
                                    </div>
                                </div>

                                <div class="form-input">
                                    <label>權限</label>

                                    <div class="select">
                                        <select name="power" required>
                                            <?php
                                            $power = old('power') ?? ($user['u_power'] ?? '');
                                            ?>

                                            <option value="1" <?= $power == 1 ? 'selected' : ''; ?>>一般使用者</option>
                                            <option value="99" <?= $power == 99 ? 'selected' : ''; ?>>管理者</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-btn">
                    <button class="btn-cancel" type="button" onclick="location.href='<?= url_to('Backend\User::index') ?>'">返回</button>
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