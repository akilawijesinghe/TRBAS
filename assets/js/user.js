$(document).ready(function () {
	// save_user button click and form submit
	$("#save_user").click(function () {
		// remove all error messages
		$(".error-message").remove();
		// get the form data
		var formData = $("#user_form").serializeArray();
		user_id = $("#addUserModal").data("id");

		if (user_id) {
			formData.push({ name: "id", value: user_id });
		}
		// submit the form
		$.ajax({
			url: base_url + "user/save_user",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addUserModal").modal("hide");
					var content = {};

					content.message = res.message;
					content.title = "Success";
					content.icon = "fa fa-bell";

					$.notify(content, {
						type: res.status,
						time: 1000,
						delay: 0,
					});

					// reload the page after 2 second
					setTimeout(function () {
						location.reload();
					}, 2000);
				}
			})
			.fail(function (data) {
				$.each(data.responseJSON, function (index, val) {
					display_error(index, val);
				});
			});
	});

	$("#addUserModal").on("show.bs.modal", function (e) {
		// get all data attributes into an array
		$("#user_form")[0].reset();
		var data = $(e.relatedTarget).data();
		// remove all data attributes from the modal
		$("#addUserModal").removeData();
		// add all data attributes to the modal
		$("#addUserModal").data(data);

		if (e.relatedTarget) {
			$.each(data, function (index, val) {
				$("#" + index).val(val);
			});
		}
	});

	$("#deleteUserModal").on("show.bs.modal", function (e) {
		$("#delete_user_id").val("");
		var user_id = $(e.relatedTarget).data("id");
		$("#delete_user_id").val(user_id);
	});

	// delete_user button click
	$("#delete_user").click(function () {
		var user_id = $("#delete_user_id").val();

		$.ajax({
			url: base_url + "user/delete_user",
			type: "POST",
			dataType: "json",
			data: { id: user_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deleteUserModal").modal("hide");
					var content = {};

					content.message = res.message;
					content.title = "Success";
					content.icon = "fa fa-bell";

					$.notify(content, {
						type: res.status,
						time: 1000,
						delay: 0,
					});
					// reload the page after 2 second
					setTimeout(function () {
						location.reload();
					}, 2000);
				}
			})
			.fail(function (data) {
				$.each(data.responseJSON, function (index, val) {
					display_error(index, val);
				});
			});
	});
});
