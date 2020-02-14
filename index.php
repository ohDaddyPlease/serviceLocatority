<?php

/**
 * Класс "Сервис локатор".
 * Является основным в данном паттерне и включает в себя статические методы и хранилище.
 */
class ServiceLocator
{

  /**
   * Хранилище сервисов
   *
   * @var array
   */
  private static $storage = [];

  /**
   * Синглтон Сервис локатор
   */
  private function __construct(){}

/**
 * Метод добавления сервиса в хранилище
 *
 * @param string $name
 * @param [type] $object
 * @return true
 */
  public static function add(string $name, $object)
  {
    self::$storage[$name] = $object;
    return true;
  }

  /**
   * Метод получения сервиса по имени
   *
   * @param string $name
   * @return var
   */
  public static function get(string $name)
  {
    return self::$storage[$name];
  }

}

class TestMe
{
  public $test = 'test property value';
}

$testVar = 'very important value';

ServiceLocator::add('TestMe', new TestMe); //занести в хранилище экземпляра класса

ServiceLocator::add('testVar', $testVar); //занести переменную в хранилище

var_dump(ServiceLocator::get('TestMe')); //получение экземпляра класса по заданному имени

echo ServiceLocator::get('testVar'); //получение значение переменной по заданному имени