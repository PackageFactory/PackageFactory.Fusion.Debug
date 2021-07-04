<?php declare(strict_types=1);
namespace PackageFactory\Fusion\Debug;

/*
 * This file is part of the PackageFactory.Fusion.Debug package
 */

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Fusion\FusionObjects\AbstractFusionObject;
use ReflectionObject;

/**
 * @Flow\Scope("singleton")
 */
final class Debug implements ProtectedContextAwareInterface
{
    /**
     * @var string
     */
    private $buffer = '';

    /**
     * @param mixed $variable
     * @param string $title
     * @param boolean $plaintext
     * @param boolean $pre
     * @return Debug
     */
    public function var_dump($variable, string $title = null, bool $plaintext = false, bool $pre = true): Debug
    {
        $this->buffer .= ($plaintext && $pre ? '<pre>' : '') . \Neos\Flow\var_dump($variable, $title, true, $plaintext) . ($plaintext && $pre ? '</pre>' : '');
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $output = $this->buffer;
        $this->buffer = '';
        return $output;
    }

    /**
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
