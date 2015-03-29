<?php

namespace Grossum\FeedbackBundle\Controller;

use Grossum\FeedbackBundle\Entity\Feedback;
use Grossum\FeedbackBundle\Form\FeedbackForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class FeedbackController extends Controller
{
    public function indexAction(Request $request)
    {
        $feedbackForm = $this->createForm(new FeedbackForm(), new Feedback());
        $feedbackForm->handleRequest($request);
        if ($feedbackForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $feedback = $feedbackForm->getData();
            $feedback->setStatus(false);
            $em->persist($feedback);
            $em->flush();

            /** @var Session $session */
            $session = $request->getSession();
            $session->getFlashBag()->add(
                'done',
                'Thank you for submitting feedback.'
            );

            return $this->redirect($this->generateUrl('grossum_feedback_homepage'));
        }

        $message = $request->getSession()->getFlashBag()->get('done', array());
        $message = isset($message[0]) ? $message[0] : "";

        return $this->render('GrossumFeedbackBundle:Feedback:index.html.twig', array(
            'feedback' => $feedbackForm->createView(),
            'message'              => $message
        ));
    }
}
