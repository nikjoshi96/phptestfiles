<?php
// New Feature of PHP (Multiple Type) allow as Data pass and in return also 
function add(int|float $a, int|float $b): int|float {
    return $a + $b;
}

echo add(5, 3.5), "<br />";     // 8
echo add(2.25, 7), "<br />"; // 10


// New Feature of PHP (Fiber)
$fiber = new Fiber(function (): void {
    echo "Fiber started<br />";

    $value = Fiber::suspend("Paused here");
    echo "Fiber resumed with value: $value<br />";

    $value = Fiber::suspend("Another pause");
    echo "Fiber resumed with value: $value<br />";
    echo "Fiber finished<br />";
});

echo "Starting fiber...<br />";
$result = $fiber->start();

echo "First suspend returned: $result<br />";

$result = $fiber->resume("Resume #1");
echo "Second suspend returned: $result<br />";

$fiber->resume("Resume #2");

?>