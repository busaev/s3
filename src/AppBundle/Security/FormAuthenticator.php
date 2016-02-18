<?php

namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Translation\Translator;

class FormAuthenticator extends AbstractGuardAuthenticator {

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    
    /**
     * @var \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder
     */
    private $passwordEncoder;
    
    /**
     * @var \Symfony\Component\Translation\Translator
     */
    private $translator;
    
    
    private $firewall = 'frontend';

    private $routs = [
        'frontend' => [
            'homepage' => 'index_index',
            'login'    => 'security_login',
        ],
        'global' => [
            'homepage' => 'backend_index_index',
            'login'    => 'backend_security_login',
        ],
    ];

    /**
     * Default message for authentication failure.
     *
     * @var string
     */
    private $failMessage = 'Invalid credentials';

    /**
     * Creates a new instance of FormAuthenticator
     */
    public function __construct(RouterInterface $router, EntityManager $em, UserPasswordEncoder $passwordEncoder, $translator) {
        $this->router = $router;
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials(Request $request) {
        if (!$request->isMethod('POST')) {
            return;
        }

        return array(
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        try {
            return $userProvider->loadUserByUsername($credentials['username']);
        } 
        catch (UsernameNotFoundException $e) {
            throw new CustomUserMessageAuthenticationException($this->translator->trans($this->failMessage));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function checkCredentials($credentials, UserInterface $user) {
        
        $plainPassword = $credentials['password'];
        $encoder = $this->passwordEncoder;
        
        if (!$encoder->isPasswordValid($user, $plainPassword)) {
            throw new CustomUserMessageAuthenticationException($this->translator->trans($this->failMessage));
        }
        
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $this->defineFirewall($request);
        
        $url = $this->router->generate($this->routs[$this->firewall]['homepage']);
        return new RedirectResponse($url);
    }

    /**
     * {@inheritdoc}
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $this->defineFirewall($request);
        
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        
        $url = $this->router->generate($this->routs[$this->firewall]['login']);
        
        return new RedirectResponse($url);
    }

    /**
     * {@inheritdoc}
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $this->defineFirewall($request);
        
        $url = $this->router->generate($this->routs[$this->firewall]['login']);
        return new RedirectResponse($url);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsRememberMe() {
        return false;
    }
    
    private function defineFirewall(Request $request)
    {
        if(preg_match('/^\/backend/i', $request->getPathInfo())) {
            $this->firewall = 'global';
        }
    }

}
