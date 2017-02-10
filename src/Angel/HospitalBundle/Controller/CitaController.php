<?php

namespace Angel\HospitalBundle\Controller;

use Angel\HospitalBundle\Entity\Cita;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Citum controller.
 *
 */
class CitaController extends Controller
{
    /**
     * Lists all citum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citas = $em->getRepository('AngelHospitalBundle:Cita')->findAll();

        return $this->render('cita/index.html.twig', array(
            'citas' => $citas,
        ));
    }

    /**
     * Creates a new citum entity.
     *
     */
    public function newAction(Request $request)
    {
        $citum = new Cita();
        $form = $this->createForm('Angel\HospitalBundle\Form\CitaType', $citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citum);
            $em->flush($citum);

            return $this->redirectToRoute('cita_show', array('id' => $citum->getId()));
        }

        return $this->render('cita/new.html.twig', array(
            'citum' => $citum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a citum entity.
     *
     */
    public function showAction(Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);

        return $this->render('cita/show.html.twig', array(
            'citum' => $citum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing citum entity.
     *
     */
    public function editAction(Request $request, Cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);
        $editForm = $this->createForm('Angel\HospitalBundle\Form\CitaType', $citum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cita_edit', array('id' => $citum->getId()));
        }

        return $this->render('cita/edit.html.twig', array(
            'citum' => $citum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a citum entity.
     *
     */
    public function deleteAction(Request $request, Cita $citum)
    {
        $form = $this->createDeleteForm($citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($citum);
            $em->flush($citum);
        }

        return $this->redirectToRoute('cita_index');
    }

    /**
     * Creates a form to delete a citum entity.
     *
     * @param Cita $citum The citum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cita $citum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cita_delete', array('id' => $citum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
