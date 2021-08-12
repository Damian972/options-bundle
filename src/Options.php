<?php

namespace Damian972\OptionsBundle;

use Damian972\OptionsBundle\Contracts\AdapterInterface;
use Damian972\OptionsBundle\Contracts\OptionInterface;
use Damian972\OptionsBundle\Contracts\OptionsInterface;

class Options implements OptionsInterface
{
    protected bool $lazy;
    protected array $options = [];
    protected bool $fullyLoaded = false;
    protected AdapterInterface $adapter;

    public function __construct(AdapterInterface $adapter, bool $lazy = false)
    {
        $this->adapter = $adapter;
        $this->lazy = $lazy;
    }

    public function get(string $key, ?string $parent = null): ?OptionInterface
    {
        if (!$this->lazy && !$this->fullyLoaded) {
            foreach ($this->adapter->getAll() as $option) {
                if (null !== $parent = $option->getParent()) {
                    if (!isset($this->options[$parent])) {
                        $this->options[$parent] = [];
                    }
                    $this->options[$parent][$option->getKey()] = $option;

                    continue;
                }
                $this->options[$option->getKey()] = $option;
            }
            $this->fullyLoaded = true;
        }

        if (null === $parent && isset($this->options[$key])) {
            return $this->options[$key];
        }

        if (null !== $parent && isset($this->options[$parent], $this->options[$parent][$key])) {
            return $this->options[$parent][$key];
        }

        if (!$this->lazy) {
            return null;
        }

        if (null !== $option = $this->adapter->get($key, $parent)) {
            if (null !== $parent = $option->getParent()) {
                $this->options[$parent] = [$option->getKey() => $option];
            } else {
                $this->options[$option->getKey()] = $option;
            }

            return $option;
        }

        return null;
    }

    public function set(OptionInterface $option): void
    {
        $this->adapter->set($option);
        if (null !== $parent = $option->getParent()) {
            $this->options[$parent] = [$option->getKey() => $option];
        } else {
            $this->options[$option->getKey()] = $option;
        }
    }

    public function has(string $key, ?string $parent = null): bool
    {
        return null !== $this->get($key, $parent);
    }

    public function setAdapter(AdapterInterface $adapter): void
    {
        $this->adapter = $adapter;
    }
}
