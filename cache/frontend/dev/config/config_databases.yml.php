<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2012/10/11 22:58:41

return array(
'propel' => new sfPropelDatabase(array (
  'classname' => 'DebugPDO',
  'dsn' => 'mysql:dbname=dvd_club;host=localhost',
  'username' => 'root',
  'password' => 123,
  'encoding' => NULL,
  'queries' => 
  array (
    'value' => 'SET NAMES UTF8;',
  ),
  'persistent' => true,
  'pooling' => true,
  'debug' => 
  array (
    'realmemoryusage' => true,
    'details' => 
    array (
      'time' => 
      array (
        'enabled' => true,
      ),
      'slow' => 
      array (
        'enabled' => true,
        'threshold' => 0.1,
      ),
      'mem' => 
      array (
        'enabled' => true,
      ),
      'mempeak' => 
      array (
        'enabled' => true,
      ),
      'memdelta' => 
      array (
        'enabled' => true,
      ),
    ),
  ),
  'name' => 'propel',
)),);
