$(document).ready(function () {
	// register_link click event
	$("#register_link").click(function () {
		$("#login_form").css("display", "none");
		$("#register_form").css("display", "block");
	});

	// login_link click event
	$("#login_link").click(function () {
		$("#register_form").css("display", "none");
		$("#login_form").css("display", "block");
	});

	// login_btn click event
	$("#login_btn").click(function () {
		var email = $("#email").val();
		var password = $("#password").val();
		$(".error-message").text("").hide;

		$.ajax({
			url: base_url + "login/authenticate",
			type: "POST",
			dataType: "json",
			data: { email: email, password: password },
		})
			.done(function (res) {
				window.location.href = base_url + res.role;
			})
			.fail(function (data) {
				$.each(data.responseJSON, function (index, val) {
					if (index == "credentials_error") {
						$("#err_cont").css("display", "block");
					}
					display_error(index, val);
				});
			});
	});

	$("#register_btn").click(function () {
		var registerData = $("#registerForm").serializeArray();
		$(".error-message").text("").hide();
		// clear email 
		$("#email_verify").val("");
		$.ajax({
			url: base_url + "login/register_customer",
			type: "POST",
			dataType: "json",
			data: registerData,
		})
			.done(function (res) {
				$("#register_form").css("display", "none");
				$("#verify_form").css("display", "block");
				$("#email_verify").val($("#email_reg").val());
			})
			.fail(function (data) {
				$.each(data.responseJSON, function (index, val) {
					display_error(index, val);
				});
			});
	});

	$("#verify_btn").click(function () {
		var verifyData = $("#verifyForm").serializeArray();
		$(".error-message").text("").hide();
		$.ajax({
			url: base_url + "login/verify_customer",
			type: "POST",
			dataType: "json",
			data: verifyData,
		})
			.done(function (res) {
				window.location.href = base_url + res.role;
			})
			.fail(function (data) {
				$.each(data.responseJSON, function (index, val) {
					display_error(index, val);
				});
			});
	});
});
