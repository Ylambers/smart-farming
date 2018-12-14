<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 12-Dec-18
 * Time: 12:36
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Form\Dashboard\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function editUserDetails(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(['id' => $id]);

        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Unable to access this page!');

        if (!$user){
            return $this->redirect('/user');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            return $this->redirect($this->generateUrl('show_all_users'));
        }

        return $this->render(':dashboard/user:edit.html.twig',[
            'form' => $form->createView()
        ]);
    }
}