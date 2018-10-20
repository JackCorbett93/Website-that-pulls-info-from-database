window.addEventListener("load", function(event) {

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click", submitform);


    function submitform(evt) {
        var value = true;
		//gets all input fields as variables
        var categorybtn = document.getElementsByName("category");
        var nameField = document.getElementById("name");
        var desField = document.getElementById("description");
        var priceField = document.getElementById("price");
		var dimensionsField = document.getElementsByName("dimensions");
        document.getElementById("4").innerHTML = "   ";
		document.getElementById("5").innerHTML = "   ";
		//gets values of input fields
        var x = nameField.value;
        var y = desField.value;
        var z = priceField.value
		var c = dimensionsField.value
		//checks all category
		for (var i = 0; i != categorybtn.length; i++) {
            categorybtn[i];
            if (categorybtn[i].checked) {
                console.log("it worked!");
                //break;
            } else {
                document.getElementById("4").innerHTML = "Please select an category";
                value = false;
            }
        }
		 if (c === "") {
            document.getElementById("3").innerHTML = "Please enter a Dimension";
            value = false;
		} else {
			document.getElementById("3").innerHTML = "";
            value = true;
			}
        if (x === "") {
            document.getElementById("1").innerHTML = "Please enter a Name";
            value = false;

        } else {
            document.getElementById("1").innerHTML = "";
            value = true;
        }
        if (y === "") {
            document.getElementById("2").innerHTML = "Please enter a Description";
            value = false;

        } else {
            document.getElementById("2").innerHTML = "";
            value = true;
        }
        if (z === "") {
            document.getElementById("5").innerHTML = "Please enter a Price";
            value = false;

        } else {
            document.getElementById("5").innerHTML = "";
            value = true;
        }
        

        if (value == false) {
            //evt.preventDefault();
        } 
    }
});