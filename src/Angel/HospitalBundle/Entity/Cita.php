<?php

namespace Angel\HospitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cita
 *
 * @ORM\Table(name="Cita", indexes={@ORM\Index(name="IDX_9E05355CDA3580D5", columns={"IdPaciente"}), @ORM\Index(name="IDX_9E05355CAE825B80", columns={"IdMedico"})})
 * @ORM\Entity
 */
class Cita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdCita", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcita;

    /**
     * @var string
     *
     * @ORM\Column(name="HCita", type="string", length=50, nullable=false)
     */
    private $hcita;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="string", length=50, nullable=false)
     */
    private $observaciones;

    /**
     * @var \Paciente
     *
     * @ORM\ManyToOne(targetEntity="Paciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdPaciente", referencedColumnName="IdPaciente")
     * })
     */
    private $idpaciente;

    /**
     * @var \Medico
     *
     * @ORM\ManyToOne(targetEntity="Medico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdMedico", referencedColumnName="IdMedico")
     * })
     */
    private $idmedico;



    /**
     * Get idcita
     *
     * @return integer
     */
    public function getIdcita()
    {
        return $this->idcita;
    }

    /**
     * Set hcita
     *
     * @param string $hcita
     *
     * @return Cita
     */
    public function setHcita($hcita)
    {
        $this->hcita = $hcita;

        return $this;
    }

    /**
     * Get hcita
     *
     * @return string
     */
    public function getHcita()
    {
        return $this->hcita;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Cita
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set idpaciente
     *
     * @param \Angel\HospitalBundle\Entity\Paciente $idpaciente
     *
     * @return Cita
     */
    public function setIdpaciente(\Angel\HospitalBundle\Entity\Paciente $idpaciente = null)
    {
        $this->idpaciente = $idpaciente;

        return $this;
    }

    /**
     * Get idpaciente
     *
     * @return \Angel\HospitalBundle\Entity\Paciente
     */
    public function getIdpaciente()
    {
        return $this->idpaciente;
    }

    /**
     * Set idmedico
     *
     * @param \Angel\HospitalBundle\Entity\Medico $idmedico
     *
     * @return Cita
     */
    public function setIdmedico(\Angel\HospitalBundle\Entity\Medico $idmedico = null)
    {
        $this->idmedico = $idmedico;

        return $this;
    }

    /**
     * Get idmedico
     *
     * @return \Angel\HospitalBundle\Entity\Medico
     */
    public function getIdmedico()
    {
        return $this->idmedico;
    }
}
