<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $user = $this->userService->register($request);
        return $user;
    }


    public function login(Request $request)
    {
        $user = $this->userService->login($request);
        return $user;
    }

    public function logoff()
    {
        $user = $this->userService->logoff();
        return $user;
    }
    public function refreshToken()
    {
        $user = $this->userService->refreshToken();
        return $user;
    }

}
