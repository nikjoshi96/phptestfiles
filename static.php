<?php
	class A
	{
		public static $count = 0;
		public $var = 0;

		public static function increment()
		{
			self::$count++;
			return self::$count;
		}

		public function variableCount()
		{
			$this->var++;
			return $this->var;
		}
	}

	$a1 = new A();
	$cnt = $a1->increment();
	$var = $a1->variableCount();
	echo $cnt.'/'.$var."<br />";

	$a2 = new A();
	$cnt = $a2->increment();
	$var = $a2->variableCount();
	echo $cnt.'/'.$var."<br />";
?>