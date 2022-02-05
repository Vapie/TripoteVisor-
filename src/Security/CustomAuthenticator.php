<?php
//
//
//// src/Security/CustomAuthenticator.php
//namespace App\Security;
//
//use App\Repository\UserRepository;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
//use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
//use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
//
//// ...
//
//class CustomAuthenticator extends AbstractAuthenticator
//{
//    private $userRepository;
//
//    public function __construct(UserRepository $userRepository)
//    {
//        $this->userRepository = $userRepository;
//    }
//
//    public function authenticate(Request $request): Passport
//    {
//        // ...
//
//        return new Passport(
//            new UserBadge($email, function ($userIdentifier) {
//                return $this->userRepository->findOneBy(['email' => $userIdentifier]);
//            }),
//            $credentials
//        );
//    }
//}