<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * 在控制器執行之前處理請求
     *
     * @param RequestInterface $request
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // 獲取當前 URI 路徑
        $uri = $request->getUri();
        $path = trim($uri->getPath(), '/');
        
        // 將路徑分割為段落
        $segments = explode('/', $path);
        
        // 檢查是否是登入相關頁面
        if (count($segments) > 0 && $segments[0] === 'backend') {
            // 當只有 backend 或是 backend/login 或 backend/logout 時允許訪問
            if (count($segments) === 1 || 
                (count($segments) === 2 && ($segments[1] === 'login' || $segments[1] === 'logout'))) {
                return;
            }
        }
        
        // 檢查用戶是否已登入
        $session = session();
        
        if (!$session->has('USER_ID')) {
            // 用戶未登入，重定向到登入頁面
            return redirect()->to(base_url('/backend'));
        }
    }

    /**
     * 在控制器執行後處理響應
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 不需要在控制器執行後做任何處理
    }
} 