function calculate() {
	var x = document.getElementById("outputTable");

	document.getElementById("redo").style.display = "block";

	x.style.display = "block";
	var fName = document.getElementById("firstName").value;
	var lName = document.getElementById("lastName").value;
	var price = document.getElementById("price").value;
	var comission = document.getElementById("comission").value;

	x.rows[0].cells[1].innerHTML = fName;
	x.rows[1].cells[1].innerHTML = lName;
	x.rows[2].cells[1].innerHTML = price;
	x.rows[3].cells[1].innerHTML = comission;


}