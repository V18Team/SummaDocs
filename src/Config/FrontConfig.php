<?php
/**
 *
 * This code is part of SummaDocs system.
 * (c) SummaDocs 2018
 *
 * If you want, you can see license file at https://github.com/v18-team/SummaDocs/LICENSE
 *
 *
 * @author Mariusz08 < https://github.com/Mariusz08 >
 */

namespace App\Config;

use Symfony\Component\Yaml\Yaml;

final class FrontConfig
{
    private $file = __DIR__ . './FrontConfig.yaml';

    /**
     * @param string $property
     * @return string
     */
    public function get(string $property = ''): string
    {
        return $this->getFromYaml($property);
    }

    /**
     * @param string $property
     * @return string
     */
    private function getFromYaml(string $property = ''): string
    {
        $propertyInArray = Yaml::parseFile($this->file);
        if (isset($propertyInArray[$property])) {
            return $propertyInArray[$property];
        } else {
            return 'This property does not exists!';
        }
    }
}