<?php
/**
 * Created by PhpStorm.
 * User: ylamb
 * Date: 14-10-2016
 * Time: 17:30
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserProfileRepository")

 */
class User extends BaseUser
{

   /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var date
     *
     * @ORM\Column(name="date_of_birth", type="date", length=255, nullable=true)
     */
    private $dateOfBirth;


    public function __construct()
    {
        parent::__construct();
    }



}
