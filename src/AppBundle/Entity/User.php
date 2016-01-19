<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * @DescriptionObject("users")
 * 
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
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
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Description("email", title="Email", dataType="string")
     * 
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @ORM\Column(name="api_key", type="string", nullable=true)
     */
    private $apiKey;
    
    
    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="user", cascade={"persist", "remove"})
     * @ORM\OrderBy({"createdAt" = "ASC"})
     */
    private $history;


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

    public function __construct()
    {
        $this->isActive  = true;
        $this->userRoles = new ArrayCollection();
        $this->history = new ArrayCollection();
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
    
    function setUsername($username) {
        $this->username = $username;
    }
        
    function getEmail() 
    {
        return $this->email;
    }

    function getIsActive() 
    {
        return $this->isActive;
    }

    function setEmail($email) 
    {
        $this->email = $email;
    }

    function setIsActive($isActive) 
    {
        $this->isActive = $isActive;
    }
    
    function getApiKey() 
    {
        return $this->apiKey;
    }

    function setApiKey($apiKey) 
    {
        $this->apiKey = $apiKey;
    }
    
    
    /**
     * ###########################################
     * ############# Assotiations ################ 
     * ########################################### 
     */
    

    /**
     * Add history
     *
     * @param \AppBundle\Entity\History $history
     *
     * @return User
     */
    public function addHistory(\AppBundle\Entity\History $history)
    {
        $this->history[] = $history;

        return $this;
    }

    /**
     * Remove history
     *
     * @param \AppBundle\Entity\History $history
     */
    public function removeHistory(\AppBundle\Entity\History $history)
    {
        $this->history->removeElement($history);
    }

    /**
     * Get history
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistory()
    {
        return $this->history;
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
        return $this->isActive;
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

    /**
     * Add userRoles
     *
     * @param Core\UserBundle\Entity\Role $userRoles
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
     * @param Core\UserBundle\Entity\Role $userRoles
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
            $this->isActive,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
