<?php

namespace Damian972\OptionsBundle\Contracts;

interface OptionInterface
{
    public function getId(): ?int;

    public function getName(): string;

    public function setName(string $name): self;

    public function getKey(): string;

    public function setKey(string $key): self;

    public function getValue(): string;

    public function setValue(string $value): self;

    public function getParent(): ?string;

    public function setParent(?string $parent): self;

    public static function make(string $key, string $value, ?string $parent = null): self;
}
