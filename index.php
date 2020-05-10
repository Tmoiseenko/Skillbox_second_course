<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();

require_once 'bootstrap.php';

use App\Router;
use App\Controllers\Authorization;
use App\Controllers\Registration;
use App\Controllers\Main;
use App\Controllers\Admin;
use App\Controllers\Post;
use App\Controllers\Page;
use App\Controllers\Subscribe;
use App\Controllers\Profile;
use App\Controllers\Comment;
use App\Controllers\Category;

use App\Application;

$router = new Router();

$router->get('/(\?.*?)?$', Main::class.'@getIndex');
$router->get('/post/\d+', Post::class.'@getPost');
$router->get('/page/\d+', Page::class.'@getPage');
$router->get('/login', Authorization::class.'@getLoginForm');
$router->post('/login', Authorization::class.'@login');
$router->get('/logout', Authorization::class.'@logout');
$router->get('/register', Registration::class.'@getRegisterForm');
$router->post('/register', Registration::class.'@register');

$router->get('/admin', Admin::class.'@getIndex');
$router->get('/admin/\w+(\?.*?)?$', Admin::class.'@getModel');
$router->get('/admin/post/create', Post::class.'@createPost');
$router->post('/admin/post/create', Post::class.'@savePost');
$router->get('/admin/post/update/\d+', Post::class.'@getUpdatePost');
$router->post('/admin/post/update/\d+', Post::class.'@saveUpdatePost');
$router->get('/admin/subscribe/delete/\d+', Subscribe::class.'@delete');
$router->get('/admin/page/create', Page::class.'@createPage');
$router->post('/admin/page/create', Page::class.'@savePage');
$router->get('/admin/page/update/\d+', Page::class.'@getUpdatePage');
$router->post('/admin/page/update/\d+', Page::class.'@saveUpdatePage');
$router->get('/admin/comment/moderate/\d+', Comment::class.'@confirmComment');

$router->post('/subscribe', Subscribe::class.'@add');
$router->get('/subscribe/delete/user/*', Subscribe::class.'@unsubscribe');
$router->get('/profile/([a-zA-Z]+)', Profile::class.'@getProfile');
$router->get('/profile/([a-zA-Z]+)/edit', Profile::class.'@editProfileForm');
$router->post('/profile/([a-zA-Z]+)/edit', Profile::class.'@editProfile');
$router->post('/comment/\d+', Comment::class.'@saveComment');
$router->get('/category/\d+', Post::class.'@getPostsForCategory');



$application = new Application($router);
$application->run();
//var_dump($_SESSION);
