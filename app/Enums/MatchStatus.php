<?php

namespace App\Enums;

enum MatchStatus:string
{
    case UPCOMING = 'Upcoming';

    case LIVE = 'Live';

    case COMPLETED = 'Completed';
}