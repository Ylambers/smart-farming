<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 12-Dec-18
 * Time: 12:36
 */

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/admin/dashboard/users")
 */
class UserController extends Controller
{
    /**
     * @Route("/show_users", name="show_all_users")
     */
    public function showAllUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();


        return $this->render('dashboard/user/show.html.twig', [
            'user' => $users
        ]);
    }

    /**
     * @Route("/show_user_details/{id}", name="show_user_details")
     */
    public function showUserDetailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(['id' => $id]);

        return $this->render(':dashboard/user:details.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/edit_user_details/{id}", name="edit_user_details")
     */
    public function editUserDetails($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(['id' => $id]);

        return $this->render(':dashboard/user:details.html.twig', [
            'user' => $user
        ]);
    }
}