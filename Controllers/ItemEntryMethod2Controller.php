<?php
// Check if file input has an uploaded file
if (isset($_FILES['fileUploader']['name']) && $_FILES['fileUploader']['name'] != null) 
{
	// Separates the file name
	$filename_extension = explode(".", $_FILES['fileUploader']['name']);

	// Checks if the file is a CSV
	if ($filename_extension[1] == 'csv')
	{
		echo "This is a CSV file<br>";

		$filename = $_FILES['fileUploader']['name'];
		$tempName = $_FILES['fileUploader']['tmp_name'];
		$location = "C:/xampp/htdocs/Implementation/Controllers/";

		echo $filename . "<br>";
		echo $location.$filename . "<br>";
		echo basename($filename);

		// Move the file
		//move_uploaded_file($tempName, $location.$filename);

		if (move_uploaded_file($tempName, $location.$filename)) {
			echo "File UPLOADED<br>";

			// Opens the file
			$handle = fopen($_FILES['fileUploader']['name'], "r");
			
			if ($handle) {
				$header = fgetcsv($handle);

				for ($i = 0; $i < count($header); $i++) {
					echo $header[$i] . "==";
				}
				
				echo "<br>";

				// Create an array
				$myArray = array();
				
				while($data = fgetcsv($handle))
				{
					echo $data[0] . "-" . $data[1] . "<br>";
					array_push($myArray, $data[0]);
				}

				echo json_encode($myArray);

				unset($handle);

				if (unlink($filename)) {
					echo "File deleted";
				}
				else {
					echo "File has not been deleted";
				}
			}
			else {
				echo "No handle";
			}
		}
	}
}
else {
	// Failed
	header("Location: ../Views/Item Entry/item_entry.html?result=fileNotUploaded");
}
?>