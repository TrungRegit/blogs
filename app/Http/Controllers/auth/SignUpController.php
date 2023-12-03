<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SignUpController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signUpForm(): View
    {
        return view('auth.sign_up');
    }

    public function signUp(SignUpRequest $request): RedirectResponse
    {
        return $this->userService->createUser($request->only(['username', 'email', 'password']));
    }
}
