$("#newsletterForm").validator().on("submit", function(event) {
	if (event.isDefaultPrevented()) {
		// handle the invalid form...
		formErrorNewsletter();
        submitMSGNewsletter(false, "Por favor llene todos los campos requeridos");
    } else {
    	// everything looks good!
        event.preventDefault();
        submitFormNewsletter();
    }
});

function submitFormNewsletter() {
	// Initiate Variables With Form Content
	var email = $("#email").val();

    $.ajax({
    	type: "POST",
    	url: "php/newsletter.php",
    	data: "email=" + email,
    	success: function(text) {
    		if (text == "success") {
    			formSuccessNewsletter();
    		} else {
    			formErrorNewsletter();
                submitMSGNewsletter(false, text);
            }
        }
    });
}

function formSuccessNewsletter() {
	$("#newsletterForm");
    submitMSGNewsletter(true, "¡Mensaje Enviado!");
    document.getElementById("newsletterForm").reset();
}

function formErrorNewsletter() {
	$("#newsletterForm").addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
		$(this).removeClass();
	});
}

function submitMSGNewsletter(valid, msg) {
	if (valid) {
        var msgClasses = "h5 text-center fadeIn animated text-success";
	} else {
		var msgClasses = "h5 text-center text-danger";
	} $("#msgSubmitNewsletter").removeClass().addClass(msgClasses).text(msg);
}