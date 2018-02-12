<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grouping;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Services\Algorithm;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * Verifies if the algorithm can find a valid grouping.
     * @Route("/verify", name="verify")
     * @Method("POST")
     */
    public function verifyAction(Request $request, Algorithm $algorithm)
    {
        if (!empty($request->get('distribution')) && !empty($request->get('dimension'))) {
            $distr = $request->get('distribution');
            $dim = $request->get('dimension');

            # validate the input: only digits, commas and spaces are allowed
            if (preg_match('/^\d+(?:\s*,\s*\d+)*$/', $distr) && preg_match('/^\d+\s*$/', $dim)) {
                $response = $algorithm->verify($distr, $dim);
            }
            else {
                $response = 'Sunt permise doar cifre, virgule si spatii';
            }
        }
        else {
            $response = 'Va rugam introduceti toate numerele';
        }

        if (is_array($response)) {
            # create a new grouping entity and persist the results
            $grouping = new Grouping();
            $grouping->setColours($dim)->setDistribution($distr)->setGrouping($response);

            $em = $this->getDoctrine()->getManager();
            $em->persist($grouping);
            $em->flush();

            return $this->render('default/rows.html.twig', array(
                'rows' => $response
            ));
        }
        else {  # error messages
            return new Response($response, Response::HTTP_OK);
        }
    }

    /**
     * Lists all grouping entities.
     * @Route("/list", name="grouping_index")
     * @Method("GET")
     */
    public function groupingIndexAction()
    {
        $groupings = $this->getDoctrine()->getRepository(Grouping::class)->findAll();

        return $this->render('default/list.html.twig', array(
            'groupings' => $groupings
        ));
    }
}