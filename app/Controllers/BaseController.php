<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ProductMainCategoriesModel;
use App\Models\PermissionModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * 權限模型
     * 
     * @var PermissionModel
     */
    protected $permissionModel;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];   

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        
        // 初始化權限模型
        $this->permissionModel = new PermissionModel();
    }

    /**
     * 檢查當前用戶是否有權限訪問特定功能
     * 
     * @param string $permission 權限代碼 
     * @return bool 是否有權限
     */
    protected function checkPermission($permission)
    {
        // 獲取當前用戶權限等級和用戶ID
        $userPower = session()->get('u_power') ?? 0;
        $userId = session()->get('USER_ID');
        
        // 管理者擁有所有權限
        if ($userPower == 99) {
            return true;
        }
        
        // 檢查特定權限
        return $this->permissionModel->hasUserPermission($userId, $permission);
    }
    
    /**
     * 確保用戶有權限訪問，如果沒有則重定向到首頁
     * 
     * @param string $permission 權限代碼
     * @return bool 是否有權限 (有權限返回 true，無權限會重定向)
     */
    protected function ensurePermission($permission)
    {
        if (!$this->checkPermission($permission)) {
            // 無權限，重定向到首頁
            header('Location: ' . base_url('backend/setting/mypage'));
            exit;
        }
        
        return true;
    }
}
