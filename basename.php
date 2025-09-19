<?php
	$url = "https://cdn.filestackcontent.com/WXKdKjDUSoKaLDLwkC71";
	$filename = basename($url);
	echo $filename."<br/>";

	/*$filePath = 'images/'.$filename;

	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	echo $extension."<br/>";

	$imageData = file_get_contents($url);
	if ($imageData !== false)
    {
    	file_put_contents($filePath, $imageData);
    	echo "Image saved successfully!";
		//unlink($filePath);
	} else {
    	echo "Failed to download image.";
	}*/

	// Get the file content
$result = getFileExtensionFromUrl($url);

echo "MIME type: " . $result['mime'] . "\n";
echo "Extension: ." . $result['extension'];


function getFileExtensionFromUrl($url) {
    // Step 1: Download file content
    $data = file_get_contents($url);
    if ($data === false) {
        return "Unable to download file.";
    }

    // Step 2: Detect MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($data);

    // Step 3: Map MIME type to file extension
    $mimeMap = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
        'application/pdf' => 'pdf',
        'application/zip' => 'zip',
        'video/mp4' => 'mp4',
        'audio/mpeg' => 'mp3',
        'application/msword' => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
        // Add more as needed
    ];

    $extension = $mimeMap[$mimeType] ?? 'unknown';
    
    return [
        'mime' => $mimeType,
        'extension' => $extension
    ];
}

?>