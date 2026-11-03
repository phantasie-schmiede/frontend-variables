<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Frontend Variables.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\FrontendVariables\Domain\Model;

use JsonException;
use PSBits\Foundation\Attribute\TCA\ColumnType\Input;
use PSBits\Foundation\Attribute\TCA\Ctrl;
use PSBits\Foundation\Utility\StringUtility;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class FrontendVariable
 *
 * @package PSBits\FrontendVariables\Domain\Model
 */
#[Ctrl(ignorePageTypeRestriction: true, label: 'name', rootLevel: -1)]
class FrontendVariable extends AbstractEntity
{
    #[Input]
    protected string $name = '';

    #[Input]
    protected string $value = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function getRawValue(): string
    {
        return $this->value;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws JsonException
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
     */
    public function getValue(): string
    {
        return (string)StringUtility::convertString($this->value);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
