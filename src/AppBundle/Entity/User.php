<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * @DescriptionObject("users", title="Users", description="Mega user", actions={
 *   "backend": {
 *     "show": {
 *         "title": "Show",
 *         "icon": "fa-search",
 *         "route_name": "backend_module_entry_show",
 *         "params": {
 *             "id": "id",
 *             "entityCode": "user"
 *         }
 *     },
 *     "edit": {
 *         "title": "Edit",
 *         "icon": "fa-pencil",
 *         "route_name": "backend_user_edit",
 *         "params": {
 *             "id": "id"
 *         }
 *     },
 *     "password": {
 *         "title": "Edit password",
 *         "icon": "fa-asterisk",
 *         "route_name": "backend_user_password_edit",
 *         "params": {
 *             "id": "id"
 *         }
 *     },
 *     "history": {
 *         "title": "History",
 *         "icon": "fa-history",
 *         "route_name": "backend_module_entry_history",
 *         "params": {
 *             "id": "id",
 *             "entityCode": "user"
 *         }
 *     }
 *   },
 *   "frontend": {
 *     "add": {
 *         "route_name": "news_show",
 *         "params": {
 *             "id": "id"
 *         }
 *     }
 *   }
 * })
 * 
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
    /**
     * @Description("id", title="Id", dataType="integer")
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Description("username", title="Username", dataType="string")
     * 
     * @Assert\NotBlank()
     * 
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * 
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $password;

    /**
     * @Description("email", title="Email", dataType="string")
     * 
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * 
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @ORM\Column(name="api_key", type="string", nullable=true)
     */
    private $apiKey;
    
    
    /**
     * OAuth
     */
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $realName;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email2;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email3;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $avatar;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mid;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $social;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastLogin;
    
    
    /**
     * #################################################
     * ####################  События  ##################
     * #################################################
     */
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        //using Doctrine DateTime here
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        //using Doctrine DateTime here
        $this->updatedAt = new \DateTime('now');
    }
    
    
    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    
    /**
     * 
     * @Description("Roles", title="User roles", dataType="array")
     * 
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
    

    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
        
    public function getEmail() 
    {
        return $this->email;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }
    
    public function getApiKey() 
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey) 
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Set entryStatus
     *
     * @param \AppBundle\Entity\Core\ScrollItem $entryStatus
     *
     * @return User
     */
    public function setEntryStatus(\AppBundle\Entity\Core\ScrollItem $entryStatus = null)
    {
        $this->entryStatus = $entryStatus;

        return $this;
    }

    /**
     * Get entryStatus
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getEntryStatus()
    {
        return $this->entryStatus;
    }
    
    /**
     * Не используется, но нужня для AdvancedUserInterface
     * 
     * @return null
     */
    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }

    
    public function eraseCredentials()
    {
    }
    
    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return true;
//        \Symfony\Component\VarDumper\VarDumper::dump($this->getEntryStatus());
//        die();
        return $this->getEntryStatus()->getCode() != 'delete';
    }
    
    /**
     * Gets the user roles.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    function setUserRoles(ArrayCollection $userRoles) {
        $this->userRoles = $userRoles;
    }
    
    /**
     * Gets an array of roles.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }
    
    public function getRealName() {
        return $this->realName;
    }

    public function getEmail2() {
        return $this->email2;
    }

    public function getEmail3() {
        return $this->email3;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getMid() {
        return $this->mid;
    }

    public function getSocial() {
        return $this->social;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function setRealName($realName) {
        $this->realName = $realName;
    }

    public function setEmail2($email2) {
        $this->email2 = $email2;
    }

    public function setEmail3($email3) {
        $this->email3 = $email3;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setMid($mid) {
        $this->mid = $mid;
    }

    public function setSocial($social) {
        $this->social = $social;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }

    
    /**
     * Add userRoles
     *
     * @param AppBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    
        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param AppBundle\Entity\Role $userRoles
     */
    public function removeUserRole(Role $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->entryStatus
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->entryStatus
        ) = unserialize($serialized);
    }
}
