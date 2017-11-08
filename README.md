# Xonsole
A tiny PHP framework based on laravel console, just for console based apps, now you can use the power of larave commands without a full laravel installation.

# Usage
There is no magic, just goto the `commands` directory, and create your command under the namespace `Xonsole\Commands`

```php
<?php


namespace Xonsole\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
	protected $description = "a hello world command";

	protected $signature = "hello";

	public function handle() {
		$this->info("Hello World!");
	}
}
```

Then open your `terminal` and `php app.php hello` !

# PHAR
There is a tool called [`box`](https://github.com/box-project/box2) included with `Xonsole`, its role is generating a `PHAR` package for your app.
```bash
php box build
```
and you will find the `app.phar` file that you can distribute anywhere!

# Author
I'm [Mohammed Al Ashaal](http://alash3al.github.io), a Backend Ninja!

# Contribution
Just create a pull request with your changes and I'll review then merge if needed.