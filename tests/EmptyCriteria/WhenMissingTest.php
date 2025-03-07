<?php

declare(strict_types=1);

namespace Yiisoft\Validator\Tests\EmptyCriteria;

use PHPUnit\Framework\TestCase;
use Yiisoft\Validator\EmptyCriteria\WhenMissing;
use Yiisoft\Validator\Rule\Number;
use Yiisoft\Validator\RuleInterface;
use Yiisoft\Validator\Validator;

final class WhenMissingTest extends TestCase
{
    public function dataBase(): array
    {
        return [
            [
                ['The allowed types are integer, float and string.'],
                null,
                new Number(skipOnEmpty: new WhenMissing()),
            ],
            [
                [],
                [],
                ['property' => new Number(skipOnEmpty: new WhenMissing())],
            ],
            [
                ['Value must be a number.'],
                '',
                new Number(skipOnEmpty: new WhenMissing()),
            ],
        ];
    }

    /**
     * @dataProvider dataBase
     */
    public function testBase(array $expectedMessages, mixed $data, array|RuleInterface|null $rules = null): void
    {
        $result = (new Validator())->validate($data, $rules);

        $this->assertSame($expectedMessages, $result->getErrorMessages());
    }
}
