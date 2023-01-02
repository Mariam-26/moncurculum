<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\OneToMany(targetEntity=Poste::class, mappedBy="utilisateur")
     */
    private $postes;

    /**
     * @ORM\OneToMany(targetEntity=Rqth::class, mappedBy="utilisateur")
     */
    private $rqths;

    /**
     * @ORM\OneToMany(targetEntity=Formations::class, mappedBy="utilisateur")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity=Reseaux::class, mappedBy="utilisateur")
     */
    private $reseauxes;

    /**
     * @ORM\OneToMany(targetEntity=Realisations::class, mappedBy="utilisateur")
     */
    private $realisations;

    /**
     * @ORM\OneToMany(targetEntity=Loisirs::class, mappedBy="utilisateur")
     */
    private $loisirs;

    /**
     * @ORM\OneToMany(targetEntity=Langues::class, mappedBy="utilisateur")
     */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity=Competences::class, mappedBy="utilisateur")
     */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity=Experiences::class, mappedBy="utilisateur")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Permis::class, mappedBy="utilisateur")
     */
    private $permis;

    /**
     * @ORM\OneToMany(targetEntity=Mariam::class, mappedBy="utilisateur")
     */
    private $mariams;

    public function __construct()
    {
        $this->postes = new ArrayCollection();
        $this->rqths = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->reseauxes = new ArrayCollection();
        $this->realisations = new ArrayCollection();
        $this->loisirs = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->permis = new ArrayCollection();
        $this->mariams = new ArrayCollection();
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMobile(): ?int
    {
        return $this->mobile;
    }

    public function setMobile(int $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    /**
     * @return Collection<int, Poste>
     */
    public function getPostes(): Collection
    {
        return $this->postes;
    }

    public function addPoste(Poste $poste): self
    {
        if (!$this->postes->contains($poste)) {
            $this->postes[] = $poste;
            $poste->setUtilisateur($this);
        }

        return $this;
    }

    public function removePoste(Poste $poste): self
    {
        if ($this->postes->removeElement($poste)) {
            // set the owning side to null (unless already changed)
            if ($poste->getUtilisateur() === $this) {
                $poste->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rqth>
     */
    public function getRqths(): Collection
    {
        return $this->rqths;
    }

    public function addRqth(Rqth $rqth): self
    {
        if (!$this->rqths->contains($rqth)) {
            $this->rqths[] = $rqth;
            $rqth->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRqth(Rqth $rqth): self
    {
        if ($this->rqths->removeElement($rqth)) {
            // set the owning side to null (unless already changed)
            if ($rqth->getUtilisateur() === $this) {
                $rqth->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Formations>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formations $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setUtilisateur($this);
        }

        return $this;
    }

    public function removeFormation(Formations $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getUtilisateur() === $this) {
                $formation->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reseaux>
     */
    public function getReseauxes(): Collection
    {
        return $this->reseauxes;
    }

    public function addReseaux(Reseaux $reseaux): self
    {
        if (!$this->reseauxes->contains($reseaux)) {
            $this->reseauxes[] = $reseaux;
            $reseaux->setUtilisateur($this);
        }

        return $this;
    }

    public function removeReseaux(Reseaux $reseaux): self
    {
        if ($this->reseauxes->removeElement($reseaux)) {
            // set the owning side to null (unless already changed)
            if ($reseaux->getUtilisateur() === $this) {
                $reseaux->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Realisations>
     */
    public function getRealisations(): Collection
    {
        return $this->realisations;
    }

    public function addRealisation(Realisations $realisation): self
    {
        if (!$this->realisations->contains($realisation)) {
            $this->realisations[] = $realisation;
            $realisation->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRealisation(Realisations $realisation): self
    {
        if ($this->realisations->removeElement($realisation)) {
            // set the owning side to null (unless already changed)
            if ($realisation->getUtilisateur() === $this) {
                $realisation->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Loisirs>
     */
    public function getLoisirs(): Collection
    {
        return $this->loisirs;
    }

    public function addLoisir(Loisirs $loisir): self
    {
        if (!$this->loisirs->contains($loisir)) {
            $this->loisirs[] = $loisir;
            $loisir->setUtilisateur($this);
        }

        return $this;
    }

    public function removeLoisir(Loisirs $loisir): self
    {
        if ($this->loisirs->removeElement($loisir)) {
            // set the owning side to null (unless already changed)
            if ($loisir->getUtilisateur() === $this) {
                $loisir->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Langues>
     */
    public function getLangues(): Collection
    {
        return $this->langues;
    }

    public function addLangue(Langues $langue): self
    {
        if (!$this->langues->contains($langue)) {
            $this->langues[] = $langue;
            $langue->setUtilisateur($this);
        }

        return $this;
    }

    public function removeLangue(Langues $langue): self
    {
        if ($this->langues->removeElement($langue)) {
            // set the owning side to null (unless already changed)
            if ($langue->getUtilisateur() === $this) {
                $langue->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Competences>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getUtilisateur() === $this) {
                $competence->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Experiences>
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setUtilisateur($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getUtilisateur() === $this) {
                $experience->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Permis>
     */
    public function getPermis(): Collection
    {
        return $this->permis;
    }

    public function addPermi(Permis $permi): self
    {
        if (!$this->permis->contains($permi)) {
            $this->permis[] = $permi;
            $permi->setUtilisateur($this);
        }

        return $this;
    }

    public function removePermi(Permis $permi): self
    {
        if ($this->permis->removeElement($permi)) {
            // set the owning side to null (unless already changed)
            if ($permi->getUtilisateur() === $this) {
                $permi->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mariam>
     */
    public function getMariams(): Collection
    {
        return $this->mariams;
    }

    public function addMariam(Mariam $mariam): self
    {
        if (!$this->mariams->contains($mariam)) {
            $this->mariams[] = $mariam;
            $mariam->setUtilisateur($this);
        }

        return $this;
    }

    public function removeMariam(Mariam $mariam): self
    {
        if ($this->mariams->removeElement($mariam)) {
            // set the owning side to null (unless already changed)
            if ($mariam->getUtilisateur() === $this) {
                $mariam->setUtilisateur(null);
            }
        }

        return $this;
    }
}
