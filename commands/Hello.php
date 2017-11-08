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