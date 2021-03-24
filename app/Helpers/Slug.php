<?php

namespace App\Helpers;

class Slug 
{
    public static function uniqueSlug($slug, $table)
    {
        $slug = self::createSlug($slug);
        $items = \DB::table($table)->select('slug')->whereRaw("slug Like '$slug%'")->get();

        $count = count($items)+1;

        return $slug.'-'.$count;
    }

    protected static function createSlug($str)
    {
        $string = trim($str);
        $string = mb_strtolower($string,'UTF-8');

        $string = preg_replace("/[\s\-_]+/",' ',$string);
        $string = preg_replace("/[\s\_]/",'-',$string);

        return rawurldecode($string);
    }
}