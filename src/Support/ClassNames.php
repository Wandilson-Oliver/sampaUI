<?php

namespace SampaUI\Support;

class ClassNames
{
    /**
     * Mescla classes e arrays condicionais resolvendo conflitos Tailwind CSS (estilo cn() do shadcn).
     */
    public static function merge(...$classes): string
    {
        $current = '';

        foreach ($classes as $item) {
            if (is_array($item)) {
                $str = sampaui_classes($item);
            } elseif (is_string($item)) {
                $str = trim($item);
            } else {
                $str = '';
            }

            if ($str === '') {
                continue;
            }

            if ($current === '') {
                $current = $str;
            } else {
                $current = sampaui_merge_tailwind_classes($current, $str);
            }
        }

        return $current;
    }
}
