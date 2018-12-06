<?php

namespace AppBundle\Controller\Dashboard;

use AppBundle\Entity\SiteInformation;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SiteController extends Controller
{
    public function siteInformationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('AppBundle:SiteInformation')->findOneBy(['id' => '1']);
        $newSite = new SiteInformation();
        $form = $this->createForm(\AppBundle\Form\Dashboard\SiteInformation::class, $site);

        if(is_null($site)){
            $newSite->setOwner(null);
            $newSite->setPhoneNumber(null);
            $newSite->setEmail(null);
            $newSite->setAddress(null);
            $newSite->setZipcode(null);
            $newSite->setCity(null);
            $newSite->setCountry(null);
            $newSite->setSiteName(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($newSite);
            $em->flush();

            $this->redirect($this->generateUrl('site_information'));
        }else{
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $data = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();

                return $this->redirect($this->generateUrl('site_information'));
            }

        }

        return $this->render(':admin/site:site_information.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
