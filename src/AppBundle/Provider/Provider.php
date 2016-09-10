<?php
namespace AppBundle\Provider;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use AppBundle\Entity\User;
use AppBundle\Provider\OAuthUser;
use AppBundle\Provider\AdminChecker;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
/***
 * Class Provider
 * @package CodeMe\TheBundle\Provider
 *
 *
 */
class Provider extends OAuthUserProvider
{
    /***
     * @var Session
     */
    protected $session;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Doctrine
     */
    protected $doctrine;
    /***
     * @param Session $session
     * @param Doctrine $doctrine
     * @param AdminChecker $adminChecker
     * @param RequestStack $requestStack
     */
    public function __construct(Session $session, Doctrine $doctrine, AdminChecker $adminChecker, RequestStack $requestStack) {
        $this->session = $session;
        $this->doctrine = $doctrine;
        $this->adminChecker = $adminChecker;
        $this->request   = $requestStack->getCurrentRequest();
    }
    private function getUserById($id) {
        return $this->doctrine
            ->getRepository('AppBundle\Entity\User')
            ->findOneById($id);
    }
    /***
     * @param string $id
     * @return OAuthUser|\HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByUsername($id)
    {
        $user = $this->getUserById($id);
        return new OAuthUser($id, $user, $this->adminChecker->check($user));
    }
    /***
     * @param UserResponseInterface $response
     * @return OAuthUser|\HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $uri = $this->request->getUri();
        $isMailru = false;
        
        if(strpos($uri, '/login_mailru') !== false)
            $isMailru = true;
        
        
        if($isMailru === false)
            throw new \Exception("Invalid social network login attempt");
        
        $social = "";
        if($isMailru)
            $social = "mailru";
        
        //check to see if the user is logged in and if she is logged in with the same social network
        $isLoggedInAlready = $this->session->has('user');
        $isLoggedInAlreadyId = $this->session->get('user')['id'];
        if($isLoggedInAlready && $this->session->get('user')['social'] == $social)
            return $this->loadUserByUsername($isLoggedInAlreadyId);
        
        $social_id = $response->getUsername();
        $username = $response->getUsername();
        $realName = $response->getRealName();
        $email = $response->getEmail();
        $avatar   = $response->getProfilePicture();
        //set data in session. upon logging out we just erase the whole array.
        $sessionData = array();
        $sessionData['social_id'] = $social_id;
        $sessionData['username'] = $username;
        $sessionData['realName'] = $realName;
        $sessionData['email'] = $email;
        $sessionData['avatar'] = $avatar;
        $sessionData['social'] = $social;
        $user = null;
        if($isLoggedInAlready)
            $user = $this->doctrine
                ->getRepository('AppBundle\Entity\User')
                ->findOneById($isLoggedInAlreadyId);
        else if($isMailru)
            $user = $this->doctrine
                ->getRepository('AppBundle\Entity\User')
                ->findOneByMid($social_id);
        
        if ($user == null) {
            $user = new User();
            //change these only the user hasn't been registered before.
            $user->setUsername($username);
            $user->setRealname($realName);
            $user->setAvatar($avatar);
        }
        if($isMailru)
            $user->setMid($social_id);
        
        $user->setLastLogin(new \DateTime('now'));
        $user->setSocial($social);
        // SET E-MAIL
        //if all emails are empty, set the first one to this one.
        if ($user->getEmail() == "") {
            $user->setEmail($email);
        } else {
            //if it really is an e-mail, try putting it in email2 or email3
            if($email != "") {
                //is the e-mail different than the previous one?
                if($email != $user->getEmail()) {
                    //if there an e-mail in email2? no:
                    if ($user->getEmail2() == "") {
                        $user->setEmail2($email);
                    } else {
                        //there is an e-mail in email2 and it's different. fall back to setting the user3 to w/e.
                        if ($user->getEmail2() != $email) {
                            $user->setEmail3($email);
                        }
                    }
                }
            }
        }
        //save all changes
        $em = $this->doctrine->getManager();
        $em->persist($user);
        $em->flush();
        $id = $user->getId();
        //set id
        $sessionData['id'] = $id;
        $sessionData['is_admin'] = $this->adminChecker->check($user);
        $this->session->set('user', $sessionData);
        return $this->loadUserByUsername($user->getId());
    }
    /***
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'AppBundle\\Provider\\OAuthUser';
    }
}