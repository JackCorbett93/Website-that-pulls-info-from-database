window.addEventListener("load", function(event) {

    var submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click", submitform);


    function submitform(evt) {
        var value = true;
        var osbtn = document.getElementsByName("os");
        var usernameField = document.getElementById("userName");
        var EmailField = document.getElementById("Email");
        var PasswordField = document.getElementById("Password");
        document.getElementById("4").innerHTML = "   ";
        var x = usernameField.value;
        var y = EmailField.value;
        var z = PasswordField.value

        if (x === "") {
            document.getElementById("1").innerHTML = "Please enter a Username";
            value = false;

        } else {
            document.getElementById("1").innerHTML = "";
            value = true;
        }
        if (y === "") {
            document.getElementById("2").innerHTML = "Please enter a Email";
            value = false;

        } else {
            document.getElementById("2").innerHTML = "";
            value = true;
        }
        if (z === "") {
            document.getElementById("3").innerHTML = "Please enter a Password";
            value = false;

        } else {
            document.getElementById("3").innerHTML = "";
            value = true;
        }
        for (var i = 0; i != osbtn.length; i++) {
            osbtn[i];
            if (osbtn[i].checked) {
                console.log("it worked!");
                break;
            } else {
                document.getElementById("4").innerHTML = "Please select an os";
                value = false;
            }
        }

        if (value == false) {
            evt.preventDefault();
        } else {
			// evt.preventDefault();
            console.log("john");
        }
    }

});