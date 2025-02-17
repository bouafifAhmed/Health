<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null;
    

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le motif est obligatoire.")]
    #[Assert\Choice(['Présentiel', 'En ligne'], message: "Le motif doit être 'Présentiel' ou 'En ligne'.")]
    private ?string $motif = null;

    #[ORM\Column(length: 255)]
    private ?string $diagnostic = null;

    #[ORM\Column(length: 255)]
    private ?string $traitement = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Assert\NotBlank(message: "Le prix est obligatoire.")]
    #[Assert\PositiveOrZero(message: "Le prix doit être un nombre positif ou zéro.")]
    private ?string $prix = null;

    #[ORM\ManyToOne(targetEntity: Patient::class, inversedBy: 'consultations')]
    #[ORM\JoinColumn(name: 'patient_id', referencedColumnName: 'id', nullable: false)]
    private ?Patient $Patient = null;

    #[ORM\ManyToOne(targetEntity: Docteur::class, inversedBy: 'consultations')]
    #[ORM\JoinColumn(name: 'docteur_id', referencedColumnName: 'id', nullable: false)]
    private ?Docteur $Docteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): static
    {
        $this->diagnostic = $diagnostic;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(string $traitement): static
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPatient(): ?patient
    {
        return $this->Patient;
    }

    public function setPatient(?patient $patient): static
    {
        $this->Patient = $patient;

        return $this;
    }

    public function getDocteur(): ?docteur
    {
        return $this->Docteur;
    }

    public function setDocteur(?docteur $docteur): static
    {
        $this->Docteur = $docteur;

        return $this;
    }

   
}
