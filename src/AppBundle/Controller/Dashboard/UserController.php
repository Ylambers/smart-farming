<?php

namespace AppBundle\Controller\Dashboard;

use AppBundle\Entity\User;
use AppBundle\Entity\UserProfile;
use AppBundle\Form\Dashboard\UserProfileType;
use AppBundle\Form\Dashboard\UserType;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    public function showUsersAction()
    {
        $user = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render('admin/user/show.html.twig',[
            'user' => $user
        ]);
    }

    public function editUserAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

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

            return $this->redirect($this->generateUrl('user'));
        }
        
        return $this->render('admin/user/edit.html.twig',[
            'user' => $user,
            'form' => $form->createView()
        ]);
    }


    public function userProfileAction(Request $request)
    {
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:User');

        $user->find($userId);

        $em = $this->getDoctrine()->getManager();

        $profile = $em->getRepository('AppBundle:UserProfile')
            ->findOneBy(['user' => $userId]);

        if (is_null($profile)) {
            $profile = new UserProfile();
            $profile->setUser($em->getRepository('AppBundle:User')->find($userId));
            $profile->setFirstName(null);
            $profile->setLastName(null);
            $profile->setDateOfBirth(null);
            $profile->setEmail(null);
            $profile->setPhoneNumber(null);
            $profile->setMobileNumber(null);
            $profile->setAddress(null);
            $profile->setCity(null);
            $profile->setCountry(null);
            $profile->setZipcode(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();

            return $this->redirect('/user/profile');

        }else{
            $form = $this->createForm(UserProfileType::class, $profile);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $data = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                return $this->redirect('/user/profile');
            }
        }

        return $this->render('admin/user/profile.html.twig',[
            'form' => $form->createView()
        ]);
    }


    public function allUserDetailsAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:UserProfile');
        $profile = $repository->findOneBy(['user' => $id]);

        if (is_null($profile)){
            return $this->redirect('/user');
        }

        return $this->render('admin/user/details.html.twig',[
            'user' => $profile
        ]);
    }
}
