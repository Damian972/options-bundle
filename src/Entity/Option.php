<?php

namespace Damian972\OptionsBundle\Entity;

use Damian972\OptionsBundle\Contracts\OptionInterface;
use Damian972\OptionsBundle\Repository\OptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="options")
 */
class Option implements OptionInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected string $key;

    /**
     * @ORM\Column(type="text")
     */
    protected string $value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected string $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }
}
