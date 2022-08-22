<?php

declare(strict_types=1);

namespace Yiisoft\Validator\Tests\Stub;

use Yiisoft\Validator\Rule\Equal;
use Yiisoft\Validator\Rule\Nested;

#[Nested(rules: ['name' => new Equal('world')])]
final class ObjectWithClassRules
{
    public string $name = 'hello';
}
