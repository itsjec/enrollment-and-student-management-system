<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 * 
 * Copyright (c) 2020 Ronald M. Marasigan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @copyright Copyright 2020 (https://ronmarasigan.github.io)
 * @since Version 1
 * @link https://lavalust.pinoywap.org
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'UserController::index');
$router->get('/register', 'UserController::register');
$router->get('/admin', 'UserController::admin');
$router->get('/getRow', 'UserController::getRow');
$router->get('/addnewstudent', 'UserController::addnewstudent');
$router->get('/student', 'UserController::student');
$router->get('/managestudent', 'UserController::managestudent');
$router->get('/editstudent/(:any)', 'UserController::editstudent');
$router->get('/enrollment', 'UserController::enrollment');
$router->get('login', 'UserController::login');
$router->match('/loginAuth', 'UserController::loginAuth', 'GET|POST');
$router->get('/logout', 'UserController::logout');
$router->match('/registerAuth', 'UserController::registerAuth', 'GET|POST');
$router->get('delete/(:num)', 'UserController::delete');
$router->get('deleteagain/(:num)', 'UserController::delete');
$router->get('updateStatus/(:any)', 'UserController::updateStatus');
$router->match('insert', 'UserController::insert', 'GET|POST');
$router->match('/search', 'UserController::search', 'GET|POST');
$router->post('update/', 'UserController::update');
$router->get('profile/', 'UserController::profile');
$router->match('updateProfile', 'UserController::updateProfile', 'GET|POST');