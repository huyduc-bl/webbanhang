<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

use Encore\Admin\Facades\Admin;

class HomeController extends Controller
{
   public function index()
    {
        return Admin::content(function (Content $content) {

            // optional
            $content->header('Trang');

            // optional
            $content->description('quản trị');

            // add breadcrumb since v1.5.7
            $content->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/'],
                ['text' => 'User management', 'url' => 'users'],
                ['text' => 'Product management','url' => 'products'],
                ['text' => ''],
            );

            // Fill the page body part, you can put any renderable objects here
           // $content->body('hello world');

            // Add another contents into body
           // $content->body('foo bar');

            // method `row` is alias for `body`
            //$content->row('hello world');

            // Direct rendering view, Since v1.6.12
           // $content->view('dashboard', ['data' => 'foo']);
        });
    }
}
