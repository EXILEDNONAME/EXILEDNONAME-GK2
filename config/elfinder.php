<?php

return array(

  'dir' => ['Files'],
  'disks' => [],

  'route' => [
    'prefix' => 'dashboard/file-manager',
    'middleware' => array('web', 'auth'),
    ],
    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',
    'roots' => null,
    'options' => array(),
    'root_options' => array(

    ),

  );
