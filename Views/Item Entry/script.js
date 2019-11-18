function processData() {
	$.post("../../Controllers/ItemEntryController.php", function(data) {
		console.log(data);
	});
}