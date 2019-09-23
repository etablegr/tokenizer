<?php declare(strict_types=1);

namespace Tokenizer\Filters;

class StringFilter extends AbstractFilter implements FilterInterface
{
    protected $default_options = [
        'min' => 0,
    ];

    public function filter($value)
    {
        if (is_object($value)) {
            if (method_exists($value, '__toString')) {
                $value = (string) $value;
            } else {
                return null;
            }
        }

        if (! is_scalar($value)) {
            return null;
        }

        $value = (string) $value;

        if (mb_strlen($value) < $this->getOption('min')) {
            return null;
        }

        return $value;
    }

    public function validate($value): bool
    {
        if (is_string($value)
            || is_scalar($value)
            || (is_object($value) && method_exists($value, '__toString'))
        ) {
            return true;
        }

        return parent::validate($value);
    }
}
