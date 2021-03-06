<?php

namespace AppBundle\Controller;

use AppBundle\Controller\Services\ServicesController;
use AppBundle\Entity\Answer;
use AppBundle\Entity\Topic;
use AppBundle\Entity\Rating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

/**
 * Question controller.
 *
 * @Route("/user/topic")
 */
class TopicController extends ServicesController
{
    /**
     * Lists all topic entities.
     *
     * @Route("/", name="topic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $topics = $em->getRepository('AppBundle:Topic')->findBy([], ['id' => 'DESC']);
        $category = $em->getRepository('AppBundle:Category')->findAll();

        foreach ($topics as $topic) {
            $topic->setVotes($this->getTopicVotes($topic));
        }

        return $this->render('topic/index.html.twig', array(
            'category' => $category,
            'topics' => $topics,
        ));
    }

    /**
     * Lists all topic entities.
     *
     * @Route("/search/{id}", name="topic_search_on_key")
     * @Method("GET")
     */
    public function searchQuestionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $topics = $em->getRepository('AppBundle:Topic')->findBy(['category' => $id]);
        $category = $em->getRepository('AppBundle:Category')->findAll();

        foreach ($topics as $topic) {
            $topic->setVotes($this->getTopicVotes($topic));
        }

        return $this->render('topic/index.html.twig', array(
            'category' => $category,
            'topics' => $topics,
        ));
    }


    /**
     * Creates a new topic entity.
     *
     * @Route("/new", name="topic_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->findMainCategory();
//        $sub = $em->getRepository('AppBundle:Category')->findSubCategory(1);



        $topic = new Topic();
        $topic->setActivated(true);
        $form = $this->createForm('AppBundle\Form\TopicType', $topic);
        $form->handleRequest($request);

        $topic->setUser($this->getUser());
        $topic->setDatePosted(new \DateTime());

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $topic->getMediaPath();

            $fileName = $this->generateUniqueFileName() .'.'.$image->guessExtension();

            try {
                $image->move(
                    $this->getParameter('image_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }


            $topic->setMediaPath($fileName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($topic);
            $em->flush();

            return $this->redirectToRoute('topic_show', array('id' => $topic->getId()));
        }

        return $this->render('topic/new.html.twig', array(
            'topic' => $topic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question entity.
     *
     * @Route("/{id}", name="topic_show")
     *
     */
    public function showAction(Request $request, Topic $topic)
    {
        $em = $this->getDoctrine()->getManager();
        $givenAnswers = $em->getRepository('AppBundle:Answer')->findBy(['topic' => $topic], ['id' => 'DESC']);

        foreach ($givenAnswers as $givenAnswer) {
            $givenAnswer->setVotes($this->getAnswerVotes($givenAnswer));
        }

        $answer = new Answer();

        $answerForm = $this->createForm("AppBundle\Form\AnswerType" , $answer);
        $answer->setUser($this->getUser());
        $answer->setDatePosted(new \DateTime());
        $answer->setTopic($topic);
        $topic->setVotes($this->getTopicVotes($topic));

        $answerForm->handleRequest($request);
        if($answerForm->isSubmitted() && $answerForm->isValid())
        {
            $image = $answer->getMediaPath();

            $fileName = $this->generateUniqueFileName() .'.'.$image->guessExtension();

            try {
                $image->move(
                    $this->getParameter('image_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }


            $answer->setMediaPath($fileName);

            $em->persist($answer);
            $em->flush();

            $referer = $request->headers->get('referer'); // redirect to last page
            return $this->redirect($referer);
        }
        return $this->render('topic/show.html.twig', array(
            'givenAnswers' => $givenAnswers,
            'topic' => $topic,
            'answerForm' => $answerForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing topic entity.
     *
     * @Route("/{id}/edit", name="topic_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Topic $topic)
    {
        $editForm = $this->createForm('AppBundle\Form\TopicType', $topic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $topic->setDateEdited(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('topic_edit', array('id' => $topic->getId()));
        }

        return $this->render('topic/edit.html.twig', array(
            'topic' => $topic,
            'edit_form' => $editForm->createView(),
        ));
    }


    /**
     *
     * @Route("up_vote/answer/{answer}/{vote}}", name="up_vote_answer")
     * @Method({"GET", "POST"})
     */
    public function upvoteAnswerAction(Request $request,$answer, $vote)
    {
        $em = $this->getDoctrine()->getManager();
        $objAnswer = $em->getRepository('AppBundle:Answer')->findOneBy(['id' => $answer]);

        $findVote = $em->getRepository('AppBundle:Rating')->findOneBy(['user' => $this->getUser(), 'answer' => $answer]);

        if(!$findVote){
            $rating = new Rating();

            $rating->setVote($vote);
            $rating->setAnswer($objAnswer);
            $rating->setUser($this->getUser());

            $em->persist($rating);
            $em->flush();
        }

        $referer = $request->headers->get('referer'); // redirect to last page
        return $this->redirect($referer);
    }

    /**
     *
     * @Route("up_vote/topic/{topic}/{vote}}", name="up_vote_topic")
     * @Method({"GET", "POST"})
     */
    public function upvoteQuestionAction(Request $request,$topic, $vote)
    {
        $em = $this->getDoctrine()->getManager();
        $objQuestion= $em->getRepository('AppBundle:Topic')->findOneBy(['id' => $topic]);

        $findUpvote = $em->getRepository('AppBundle:Rating')->findOneBy(['user' =>$this->getUser(), 'topic'=> $topic]);

        if(!$findUpvote){
            $rating = new Rating();
            $rating->setVote($vote);
            $rating->setUser($this->getUser());
            $rating->setTopic($objQuestion);

            $em->persist($rating);
            $em->flush();
        }


        $referer = $request->headers->get('referer'); // redirect to last page
        return $this->redirect($referer);
    }
}
