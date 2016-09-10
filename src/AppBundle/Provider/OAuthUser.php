<?php
namespace AppBundle\Provider;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser as HWIOAuthUser;
use Symfony\Component\HttpFoundation\ParameterBag;
use AppBundle\Entity\User;

/***
 * Class OAuthUser
 * @package CodeMe\TheBundle\Provider
 *
 * This is app.user
 */
class OAuthUser extends HWIOAuthUser{
    /***
     * @var bool
     */
    public $isAdmin;
    /***
     * @var User
     */
    public $user;
    /***
     * @param string $username
     * @param bool $isAdmin
     */
    public function __construct($id, User $user, $isAdmin)
    {
        $this->user = $user;
        $this->isAdmin = $isAdmin;
//        \Symfony\Component\VarDumper\VarDumper::dump($username);
//        \Symfony\Component\VarDumper\VarDumper::dump($user);
//        \Symfony\Component\VarDumper\VarDumper::dump($isAdmin);
//        die();
        parent::__construct($id);
    }
    public function getUser() {
        return $this->user;
    }
    /***
     * @return array|\Symfony\Component\Security\Core\Role\Role[]
     */
    public function getRoles()
    {
        $roles = array('ROLE_USER', 'ROLE_OAUTH_USER');
        if ($this->isAdmin) {
            array_push($roles, 'ROLE_SUPER_ADMIN');
        }
        return $roles;
    }
}