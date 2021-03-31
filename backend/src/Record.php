<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="records")
 */
class Record
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $mid;

    public function getMid() : int {
        return $this->mid;
    }


    /**
     * @ORM\Column(type="string")
     */
    protected $sender;

    public function getSender() {
        return $this->sender;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $group_name;

    public function getGroup() {
        return $this->group_name;
    }

    public function setGroup($gid) {
        $this->group_name = $gid;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $content;

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    protected $time;

    public function getTime() {
        return $this->time;
    }

    public function setTime($t) {
        $this->time = $t;
    }

    /**
     *  @ORM\Column(type="string")
     */
    protected $type;

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}