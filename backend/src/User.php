<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $uid;

    public function getUid() : int {
        return $this->uid;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($passwd) {
        $this->password = $passwd;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $avatar;

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($name) {
        $this->avatar = $name;
    }
}