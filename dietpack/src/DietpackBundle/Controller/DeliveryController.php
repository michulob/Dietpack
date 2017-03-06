<?php

namespace DietpackBundle\Controller;

use DietpackBundle\Entity\Delivery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Delivery controller.
 *
 * @Route("delivery")
 */
class DeliveryController extends Controller
{
    /**
     * Lists all delivery entities.
     *
     * @Route("/", name="delivery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deliveries = $em->getRepository('DietpackBundle:Delivery')->findAll();

        return $this->render('delivery/index.html.twig', array(
            'deliveries' => $deliveries,
        ));
    }

    /**
     * Finds and displays a delivery entity.
     *
     * @Route("/{id}", name="delivery_show")
     * @Method("GET")
     */
    public function showAction(Delivery $delivery)
    {

        return $this->render('delivery/show.html.twig', array(
            'delivery' => $delivery,
        ));
    }
}
