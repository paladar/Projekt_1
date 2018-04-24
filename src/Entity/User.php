<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function __construct() {
        parent::__construct();
        $this->enabled = true;
        $this->roles = array('ROLE_USER');
    }

}
