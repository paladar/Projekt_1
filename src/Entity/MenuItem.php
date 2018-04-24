<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="menu_items")
 */
class MenuItem {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $name;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="MenuLabel", inversedBy="menuItems")
     * @ORM\JoinColumn(referencedColumnName="id", name="label_id")
     */
    protected $menuLabel;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getMenuLabel() {
        return $this->menuLabel;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setMenuLabel($menuLabel) {
        $this->menuLabel = $menuLabel;
    }


}
