<?php declare(strict_types=1);

namespace Tokenizer;

interface InputInterface extends IsFilterableInterface
{
    public function __construct($input = '');

    public function __toString();

    public function setInput($input): self;

    public function getInput(): string;
}
