<?php
/**
 * Created by PhpStorm.
 * User: Yaron Lambers
 * Date: 14-Dec-18
 * Time: 11:35
 */

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin/dashboard/companies")
 */
class CompanyController extends Controller
{

    /**
     *
     * @Route("/show", name="admin_show_companies")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository('AppBundle:Company')->findAll();

        return $this->render('company/index.html.twig', array(
            'companies' => $companies,
        ));
    }

    /**
     *
     * @Route("/accept/{id}", name="admin_accept_company")
     */
    public function acceptCompanyAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('AppBundle:Company')->findOneBy(['id' => $id]);

        if(!$company->getVerifiedBy()){
            $company->setVerifiedBy($this->getUser());

            $this->addFlash(
                'info',
                'Bedrijf geacepteerd!'
            );
        }else{
            $this->addFlash(
                'info',
                'Bedrijf is al geacepteerd'
            );
        }

        $em->persist($company);
        $em->flush();


        $referer = $request->headers->get('referer'); // redirect to last page
        return $this->redirect($referer);
    }
}