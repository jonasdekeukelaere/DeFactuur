<?php

namespace SumoCoders\DeFactuur\ValueObject;

use InvalidArgumentException;

final class State
{
    private const PAID = 'paid';
    private const SENT = 'sent';
    private const CREATED = 'created';

    private const ALLOWED_VALUES = [
        self::PAID,
        self::SENT,
        self::CREATED,
    ];

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;

        $this->validate();
    }

    private function validate(): void
    {
        if (!in_array($this->value, self::ALLOWED_VALUES)) {
            throw new InvalidArgumentException($this->value);
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function paid(): State
    {
        return new self(self::PAID);
    }

    public static function created(): State
    {
        return new self(self::CREATED);
    }

    public static function sent(): State
    {
        return new self(self::SENT);
    }
}
