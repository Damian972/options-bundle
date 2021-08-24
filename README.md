# OptionsBundle

The main goal of this bundle is to be able to recover an option (key / value) stored in the database.

## Installation

```bash
composer require damian972/options-bundle
```

## Usage

```php

// HelloController.php
use Damian972\OptionsBundle\Contracts\OptionsInterface;
use Damian972\OptionsBundle\Entity\Option;

...
// note: this example is tested with PHP 8
public function greeting(OptionsInterface $options): Response
{
    $options->set(Option::make('greeting', 'World'));

    // define a parent if you have multiple key with the same name
    // will create an new entry with parent field "global"
    $options->set(Option::make('greeting', 'World', 'global'));

    // if you want to use a custom name
    $options->set(Option::make('greeting', 'World')->setName('Greeting to the world'));

    $greeting = 'Hello';
    $greetingOpt = $options->get('greeting'); // or $options->get('greeting', 'global') if you want the entry with the parent "global"
    if (null !== $greetingOpt) { 
        $greeting .= " {$greetingOpt}"; // or $greetingOpt->getValue();
    } else {
        $greeting .= ' John';
    }

    ...
}

```

## Configuration

```yaml
# config/packages/options.yaml
options:
    # when set to true every call to get an "option" will trigger an SQL query unless it is already called
    # else, it will make one query to get all the "options" in the database when the get method is called for the first time
    # and cache others "options" in an associative array
    lazy: false # optionnal

    # entity class that represents an "option" object and implements the Damian972\OptionsBundle\Contracts\OptionInterface
    target_entity: Damian972\OptionsBundle\Entity\Option # optionnal

```
