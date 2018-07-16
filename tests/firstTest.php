<?php

class firstTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{

    public function test()
    {
        $cos = \Symfony\Component\Yaml\Yaml::parseFile('config.yaml');
        var_dump($cos);
    }
}
