<?php

namespace Blake\Traits;

/**
 * This trait provides some nice getter/setter functionality akin to that found in other languages. This will expose
 * private and protected properties to the world, but they can be masked by getters and setters of the same name.
 */
trait Properties
{
    /**
     * Define this in a class that uses this trait.
     *
     * @var array Prevents properties from being exposed via the magic getter or setter
     */
    // private $hiddenProperties = [];

    /**
     * Define this in a class that uses this trait.
     *
     * @var array Prevents properties from being exposed via the magic getter
     */
    // private $readOnlyProperties = [];

    /**
     * @param string $name The property to get
     *
     * @return mixed The value of the property or `null` if it's not accessible or does not exist
     */
    public function __get($name)
    {
        if (!property_exists($this, 'hiddenProperties') || !in_array($name, $this->hiddenProperties)) {
            $methodName = 'get' . ucfirst($name);

            if (method_exists($this, $methodName)) {
                return $this->$methodName();
            } elseif (property_exists($this, $name)) {
                return $this->$name;
            }
        }
    }

    /**
     * @param string $name  The property to set
     * @param mixed  $value The value to set the property to
     */
    public function __set($name, $value)
    {
        $canSet = (!property_exists($this, 'hiddenProperties')
                || !in_array($name, $this->hiddenProperties)
            )
            && (!property_exists($this, 'readOnlyProperties')
                || !in_array($name, $this->readOnlyProperties)
            )
        ;

        if ($canSet) {
            $methodName = 'set' . ucfirst($name);

            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            } elseif (property_exists($this, $name)) {
                $this->$name = $value;
            }
        }
    }
}
