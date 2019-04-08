<?php
namespace App\Helpers;

interface RouterFileInterface
{
    /**
     * include route files.
     *
     * @param string $folder
     *
     * @return bool
     */
    public static function includeRouteFiles($folder);
}
