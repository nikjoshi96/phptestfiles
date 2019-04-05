<?php
$file = 'example.csv';
$handle = fopen($file, "r");
	$all_rows = array();
$header = fgetcsv($handle);
while ($row = fgetcsv($handle)) {
  $all_rows[] = array_combine($header, $row);
}

echo '<pre>';
$p = 1;
foreach($all_rows as $post)
{
	//print_r($post);
	$id = $post['id'];
	$Name = $post['Name'];
	$Email = $post['Email'];
	$Phone = $post['Phone'];

	echo $p.") ".$id.' '.$Name.' '.$Email.'<br />';
	echo '<hr />';
	$p++;
}
?>