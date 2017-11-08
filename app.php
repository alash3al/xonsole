<?php
/**
 * Xonsole
 *
 * A simple PHP cli-apps framework based on Laravel Console component,
 * you will write the code as you are in laravel.
 *
 * @package Xonsole
 * @author 	Mohammed Al Ashaal <m7medalash3al@gmail.com>
 * @version 1.0
 * @license MIT
 * 
 * MIT License
 * Copyright (c) 2017 Mohammed Al Ashaal
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */
include "vendor/autoload.php";

/**
 * Initialize the laravel Container
 *
 * @var Illuminate\Container\Container
 * @package illuminate\container
 */
$container = new Illuminate\Container\Container;

/**
 * Initialize the laravel Event Dispacther
 *
 * @var Illuminate\Events\Dispatcher
 * @package illuminate\events
 */
$dispatcher = new Illuminate\Events\Dispatcher($container);

/**
 * Create the Xonsole application
 *
 * @var Illuminate\Console\Application
 * @package illuminate\console
 */
$xonsole = new Illuminate\Console\Application(
	$container,
	$dispatcher,
	"Xonsole 1.0"
);

/**
 * Registering all available commands
 *
 * We loop over the commands directory, then finding the `.php` files,
 * after that, we prepend our namespace `Xonsole\Command` to the filanem (without the extension),
 * and finally we add it to laravel console commands.
 */
foreach ( glob(__DIR__ . DIRECTORY_SEPARATOR . "commands" . DIRECTORY_SEPARATOR . "*.php") as $file ) {
	$xonsole->resolve(sprintf('Xonsole\Commands\%s', pathinfo($file, PATHINFO_FILENAME)));
}

/**
 * Finally, let's do the job!
 */
$xonsole->run();
