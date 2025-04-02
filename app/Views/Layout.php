<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>後台管理系統</title>
    <link href="/image/backend/favico.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/backend/style.css">
    <script src="/js/backend/jquery-2.1.4.min.js"></script>
</head>

<body>
    <article id="wrap">
        <!-- aside -->
        <aside class="aside-wrap">
            <div class="aside-logo">
                <a href="/">
                    <img src="/image/backend/logo.png" alt="Logo">
                </a>
            </div>

            <button class="toggle-sidebar">
                <i class="fas fa-angle-left"></i>
            </button>
            <div class="aside-main">
                <nav class="nav-wrap">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="<?= url_to('Setting::mypage'); ?>"><span>主頁</span></a>
                        </li>

                        <?php 
                        // 獲取當前用戶權限等級
                        $userPower = session()->get('u_power') ?? 0;
                        $userId = session()->get('USER_ID');
                        
                        // 如果是管理者，顯示所有菜單
                        $isAdmin = ($userPower == 99);
                        
                        // 獲取權限設定
                        $permModel = new \App\Models\PermissionModel();
                        
                        // 獲取用戶實際權限列表
                        $permData = $permModel->getPermissionByUserId($userId);
                        $userPermissions = [];
                        if ($permData) {
                            $userPermissions = json_decode($permData['p_permissions'], true) ?: [];
                        }
                        ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'account')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('User::index'); ?>"><span>帳號管理</span></a>
                        </li>
                        <?php endif; ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'videos')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('Videos::index'); ?>"><span>創業教學管理</span></a>
                        </li>
                        <?php endif; ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'tags')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('Tags::index'); ?>"><span>TAG管理</span></a>
                        </li>
                        <?php endif; ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'product_group')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('ProductGroup::index'); ?>"><span>作品分類管理</span></a>
                        </li>
                        <?php endif; ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'products')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('Products::index'); ?>"><span>作品管理</span></a>
                        </li>
                        <?php endif; ?>

                        <?php if($isAdmin || $permModel->hasPermission($userPower, 'contact')): ?>
                        <li class="nav-item">
                            <a href="<?= url_to('Contact::index'); ?>"><span>聯絡我們管理</span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

            <div class="aside-bottom">
                <button class="btn-logout" onClick="location.href='<?= url_to('Login::logout'); ?>'">登出</button>

                <div class="aside-time">
                    <span>登入時間</span>
                    <time><?php if (session()->get('LOGIN_TIME')) {
                                echo session()->get('LOGIN_TIME');
                            } ?></time>
                </div>
            </div>
            <button class="aside-close"></button>
        </aside>

        <!-- main -->
        <?php $this->renderSection('content'); ?>

        <div class="loading-wrap">
            <span class="loader"></span>
        </div>
    </article>

    <style>
        .loading-wrap {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .loader {
            width: 82px;
            height: 18px;
            position: relative;
        }

        .loader::before,
        .loader::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translate(-50%, 10%);
            top: 0;
            background: #FF3D00;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            animation: jump 0.5s ease-in infinite alternate;
        }

        .loader::after {
            background: #0000;
            color: #fff;
            top: 100%;
            box-shadow: 32px -20px, -32px -20px;
            animation: split 0.5s ease-out infinite alternate;
        }

        @keyframes split {
            0% {
                box-shadow: 8px -20px, -8px -20px
            }

            100% {
                box-shadow: 32px -20px, -32px -20px
            }
        }

        @keyframes jump {
            0% {
                transform: translate(-50%, -150%)
            }

            100% {
                transform: translate(-50%, 10%)
            }
        }

        /* 收合 */
        .aside-wrap {
            transition: width 0.3s ease;
            width: 250px;
            z-index: 999;
        }

        .aside-wrap.collapsed {
            width: 80px;
        }

        .aside-wrap.collapsed .nav-item span {
            display: none;
        }

        .aside-wrap.collapsed .aside-bottom {
            padding: 15px 5px;
        }

        .aside-wrap.collapsed .btn-logout {
            width: 50px;
            padding: 0;
            font-size: 0;
            position: relative;
        }

        .aside-wrap.collapsed .btn-logout:before {
            content: '\f2f5';
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 16px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .aside-wrap.collapsed .aside-time {
            transition: width 0.3s ease;
            width: 250px;
            position: relative;
            overflow: visible;
            /* 修改這裡，允許內容超出容器 */
        }

        /* 切換按鈕樣式 */
        .toggle-sidebar {
            position: absolute;
            right: -15px;
            top: 20px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--c1);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* 添加陰影效果 */
        }

        .toggle-sidebar:hover {
            background: var(--c1-h);
        }

        .container-wrap {
            transition: padding-left 0.3s ease;
            padding: 64px 35px 0 285px;
        }

        .aside-wrap.collapsed+.container-wrap {
            padding-left: 95px;
        }

        /* Logo 區域樣式 */
        .aside-logo {
            padding: 15px 20px;
            text-align: center;
            background-color: #fff;
            border-bottom: 1px solid #e5e5e5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .aside-logo img {
            max-width: 150px;
            height: auto;
        }

        /* 收合時的 logo 樣式 */
        .aside-wrap.collapsed .aside-logo {
            padding: 10px;
            background-color: #fff;
        }

        .aside-logo img {
            max-width: 150px;
            height: auto;
        }

        /* 收合時的 logo 樣式 */
        .aside-wrap.collapsed .aside-logo {
            padding: 10px;
        }

        .aside-wrap.collapsed .aside-logo img {
            max-width: 40px;
        }

        /* 調整主選單位置 */
        .aside-main {
            margin-top: 20px;
        }

        /* banner */
        .container-wrap {
            transition: padding-left 0.3s ease;
            padding: 64px 35px 0 285px;
            position: relative;
        }

        /* 新增頂部橫幅樣式 */
        .container-wrap:before {
            display: none;
        }

        /* 調整側邊欄收合時的內容區域padding */
        .aside-wrap.collapsed+.container-wrap {
            padding-left: 95px;
        }

        /* 確保內容在橫幅下方 */
        .container-wrap>* {
            position: relative;
            z-index: 91;
        }

        .top-banner {
            position: fixed;
            top: 0;
            left: 250px;
            /* 設定為側邊欄寬度 */
            right: 0;
            height: 100px;
            background-color: #e5e5e5;
            z-index: 90;
            transition: left 0.3s ease;
            /* 添加過渡效果 */
        }

        /* 側邊欄收合時調整 banner 位置 */
        .aside-wrap.collapsed~.top-banner {
            left: 80px;
            /* 設定為收合後的側邊欄寬度 */
        }

        .banner-content {
            height: 100%;
            padding: 0 35px;
            display: flex;
            align-items: center;
            color: #fff;
        }
    </style>

    <script src="/js/script.js"></script>

    <script>
        $(function() {
            // 側邊欄收合功能
            $('.toggle-sidebar').on('click', function() {
                $('.aside-wrap').toggleClass('collapsed');

                // 切換箭頭方向
                const icon = $(this).find('i');
                if (icon.hasClass('fa-angle-left')) {
                    icon.removeClass('fa-angle-left').addClass('fa-angle-right');
                } else {
                    icon.removeClass('fa-angle-right').addClass('fa-angle-left');
                }

                // 儲存狀態到 localStorage
                const isCollapsed = $('.aside-wrap').hasClass('collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);
            });

            // 頁面載入時恢復狀態
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                $('.aside-wrap').addClass('collapsed');
                $('.toggle-sidebar i').removeClass('fa-angle-left').addClass('fa-angle-right');
            }
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImg')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function ShowLoading() {
            $(".popup-overlay").fadeIn();
            $('.loading-wrap').css('display', 'flex');
        }

        function HideLoading() {
            $(".popup-overlay").fadeOut();
            $('.loading-wrap').css('display', 'none');
        }

        $('input[name="keyword"]').on('keypress', function(e) {
            if (e.keyCode == 13) {
                $(this).siblings('button').click()
            }
        })
    </script>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            $(function() {
                alert('<?php echo session()->getFlashdata('error'); ?>')
            })
        </script>
    <?php endif; ?>

    <script>
        $(function() {
            var form = $('#myForm');

            $('#myForm input').on('change', function() {
                $(window).unbind('beforeunload');
                $(window).bind('beforeunload', function() {
                    return '您確定離開此頁面嗎？請記得存檔！';
                });

            })
            $('#myForm').on('submit', function() {
                $(window).unbind('beforeunload');
            })
        })
    </script>

</body>

</html>