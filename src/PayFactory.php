<?php


namespace Gd\Pay;



class PayFactory
{

    protected $drivers = [];

    protected $configs = [];

    public function __construct()
    {
        $this->configs = dirname(__DIR__).'/config/pay.php';

        foreach ($this->configs as $key => $item)
        {
            $driverClass = $item['driver'];

            if (!class_exists($driverClass))
            {
                throw new \Exception(sprintf('[Error] class %s is invalid.', $driverClass));
            }

            $driver = new $driverClass($item);
            if (!$driver instanceof PayInterface)
            {
                throw new \Exception(sprintf('[Error] class %s is not instanceof %s.', $driverClass, PayInterface::class));
            }

            $this->drivers[$key] = $driver;
        }
    }

    public function __get($name)
    {
        return $this->get($name);
    }


    public function get(string $name)
    {
        $driver = $this->drivers[$name] ?? null;
        if (!$driver || !$driver instanceof PayInterface)
        {
            throw new Exception(sprintf('[Error]  %s is a invalid driver.', $name));
        }

        return $driver;
    }

    public function getConfig($name): array
    {
        return $this->configs[$name] ?? [];
    }

}