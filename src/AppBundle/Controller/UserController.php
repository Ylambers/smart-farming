<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 12-Dec-18
 * Time: 12:36
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/dashboard/users")
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
}