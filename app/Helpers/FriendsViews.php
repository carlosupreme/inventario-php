<?php

namespace App\Helpers;

enum FriendsViews: string
{
    case friends = 'friends';
    case requests = 'requests';
    case suggestions = 'suggestions';
    case search = 'search';
}
