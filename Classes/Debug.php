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
     * @param mixed $value
     * @param boolean $pre
     * @return Debug
     */
    public function print_r($value, bool $pre = true): Debug
    {
        $this->buffer .= ($pre ? '<pre>' : '') . print_r($value, true) . ($pre ? '</pre>' : '');
        return $this;
    }

    /**
     * @param mixed $value
     * @param boolean $pre
     * @return Debug
     */
    public function var_export($value, bool $pre = true): Debug
    {
        $this->buffer .= ($pre ? '<pre>' : '') . var_export($value, true) . ($pre ? '</pre>' : '');
        return $this;
    }

    /**
     * @param mixed $value
     * @param boolean $pre
     * @return Debug
     */
    public function xdebug_var_dump($value, bool $pre = true): Debug
    {
        ob_start();
        if (function_exists('\\xdebug_var_dump')) {
            \xdebug_var_dump($value);
        } else {
            \var_dump($value);
        }
        $output = ob_get_clean();

        $this->buffer .= ($pre ? '<pre>' : '') . $output . ($pre ? '</pre>' : '');
        return $this;
    }

    /**
     * @param AbstractFusionObject $fusionObject
     * @return string
     */
    public function fusionPath(AbstractFusionObject $fusionObject): string
    {
        $reflectionObject = new ReflectionObject($fusionObject);
        $pathReflectionProperty = $reflectionObject->getProperty('path');

        $pathReflectionProperty->setAccessible(true);

        return $pathReflectionProperty->getValue($fusionObject);
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
