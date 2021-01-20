<?php

declare(strict_types=1);

use Domain\Auth\Routes\AuthRoutes;
use Domain\Membership\Routes\MembershipRoutes;
use Domain\Objective\Routes\ObjectiveRoutes;

AuthRoutes::web();
MembershipRoutes::web();
ObjectiveRoutes::web();
