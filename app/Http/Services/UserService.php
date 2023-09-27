<?php
namespace App\Http\Services;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

 class UserService
{
     public function __construct(UserRepository $userRepository)
     {
         $this->userRepository = $userRepository;
     }

     public function register (Request $request)
     {
        $user = $this->userRepository->register($request);
        return $user;
     }

     public function login (Request $request)
     {
        $user = $this->userRepository->login($request);
        return $user;
     }

     public function logoff ()
     {
        $user = $this->userRepository->logoff();
        return $user;
     }

     public function refreshToken ()
     {
        $user = $this->userRepository->refreshToken();
        return $user;
     }
}
