<?php

namespace Blake\Mock\Traits;

use Blake\Traits\Properties;

class PropertiesImpl
{
    use Properties;

    /**
     * @var array
     */
    private $hiddenProperties = [
        'secret',
    ];

    /**
     * @var array
     */
    private $readOnlyProperties = [
        'id',
    ];

    /**
     * @var int
     */
    protected $id = 42;

    /**
     * @var string
     */
    protected $firstName = 'Hugh';

    /**
     * @var string
     */
    protected $lastName = 'Man';

    /**
     * @var string
     */
    protected $secret = "this is a secret, don't tell anyone";

    /**
     * @var int
     */
    protected $age = 35;

    /**
     * @return string
     */
    public function insideMan()
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->firstName .' '. $this->lastName;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = (int) $age;
    }
}
