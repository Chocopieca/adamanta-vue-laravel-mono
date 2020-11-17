<?php
namespace App\Services;

class ModuleDataService
{
    public static function __callStatic($name, $arguments)
    {
        return [];
    }

    public static function getBooks()
    {
        return \App\Repositories\Eloquent\BooksRepository::getAll();
    }

    public static function getAuthors()
    {
        return [];
    }

    public static function getGenres()
    {
        return [];
    }

    public static function getBlogs()
    {
        return \App\Repositories\Eloquent\BlogsRepository::getAll();
    }
}
