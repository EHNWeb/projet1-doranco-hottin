<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployesRepository::class)
 */
class Employes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=6, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\Regex("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", message="Format incorrect, les chiffres peuvent être séparés par un espace, un point ou un tiret")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\Email(message = "L'adresse e-mail: {{ value }} n'est pas valide !")
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
    * @Assert\Length(min=10, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage="Il faut {{ limit }} caractères minimum !", maxMessage="Il faut au maximum {{ limit }} caractères !" )
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $poste;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero
     * @Assert\NotBlank(message="Ce champ ne doit pas être vide !")
     */
    private $salaire;

    /**
     * @ORM\Column(type="date")
     */
    private $datedenaissance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
