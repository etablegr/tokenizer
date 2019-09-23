<?php declare(strict_types=1);

namespace Tokenizer\Filters;

abstract class AbstractFilter implements FilterInterface
{
    protected $default_options = [];

    private $options           = [];

    public function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    abstract public function filter($value);

    public function validate($value): bool
    {
        $filtered = $this->filter($value);

        return $filtered !== null;
    }

    final public function setOption(string $key, $value): FilterInterface
    {
        $this->options[$key] = $value;

        return $this;
    }

    final public function setOptions(array $options): FilterInterface
    {
        $options = array_merge($this->default_options, $options);

        foreach ($options as $key => $value) {
            if (is_string($key) && is_scalar($value)) {
                $this->setOption($key, $value);
            }
        }

        return $this;
    }

    final public function getOption(string $key)
    {
        return array_key_exists($key, $this->options) ? $this->options[$key] : null;
    }

    final public function getOptions(): array
    {
        return $this->options;
    }
}
