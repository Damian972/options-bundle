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
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected string $name;

    /**
     * @ORM\Column(name="key_name", type="string", length=255)
     */
    protected string $key;

    /**
     * @ORM\Column(type="text")
     */
    protected string $value;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $parent = null;

    public static function make(string $key, string $value, ?string $parent = null): self
    {
        $instance = new self();

        return $instance->setKey($key)
            ->setValue($value)
            ->setName($key)
            ->setParent($parent)
        ;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
