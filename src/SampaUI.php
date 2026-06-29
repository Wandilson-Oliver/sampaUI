<?php

namespace SampaUI;

class SampaUI
{
    public const VERSION = '0.1.20';

    public static function asset(string $path = 'sampaui.css'): string
    {
        return asset('vendor/sampaui/'.ltrim($path, '/'));
    }
}
