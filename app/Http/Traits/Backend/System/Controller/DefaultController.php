<?php

namespace App\Http\Traits\Backend\System\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\Backend\System\Controller\Extension\IndexController;
use App\Http\Traits\Backend\System\Controller\Extension\ShowController;
use App\Http\Traits\Backend\System\Controller\Extension\CreateStoreController;
use App\Http\Traits\Backend\System\Controller\Extension\EditUpdateController;
use App\Http\Traits\Backend\System\Controller\Extension\DestroyController;

use App\Http\Traits\Backend\System\Controller\Extension\ActiveInactiveController;
use App\Http\Traits\Backend\System\Controller\Extension\DeleteController;
use App\Http\Traits\Backend\System\Controller\Extension\RestoreController;

trait DefaultController {

  use IndexController;
  use ShowController;
  use CreateStoreController;
  use EditUpdateController;
  use DestroyController;

  use ActiveInactiveController;
  use DeleteController;
  use RestoreController;

}
