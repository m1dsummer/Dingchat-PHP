<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $rid;

    public function getRid() : int {
        return $this->rid;
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
    protected $member;

    public function getMember() {
        return $this->member;
    }

    public function setMember($member) {
        $this->member = $member;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $icon;

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }
}