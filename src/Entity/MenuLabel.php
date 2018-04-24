<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="menu_labels")
 */
class MenuLabel {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $label;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="menuLabel", cascade={"persist"})
     */
    protected $menuItems;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getLabel() {
        return $this->label;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function getMenuItems() {
        return $this->menuItems;
    }

    function addMenuItem($menuItem) {
        $this->menuItems[] = $menuItem;
    }

    function removeMenuItem($menuItem) {
        $this->menuItems->removeElement($menuItem);
    }

}
