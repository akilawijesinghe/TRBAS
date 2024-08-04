$(document).ready(function () {
	// save_billboard button click and form submit
	$("#save_location").click(function () {
		// remove all error messages
		$(".error-message").remove();
		// get the form data
		var formData = $("#location_form").serializeArray();
		var location_id = $("#addLocationModal").data("id");

		if (location_id) {
			formData.push({ name: "id", value: location_id });
		}

		// submit the form
		$.ajax({
			url: base_url + "location/save_location",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addLocationModal").modal("hide");
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

	$("#addLocationModal").on("show.bs.modal", function (e) {
		$("#addLocationModal").removeData("id");
		if (e.relatedTarget) {
			var location_name = $(e.relatedTarget).data("name");
			$("#location_name").val(location_name);
			var location_id = $(e.relatedTarget).data("id");
			$("#addLocationModal").data("id", location_id);
		} else {
			$("#location_name").val("");
		}
	});

	$("#deleteLocationModal").on("show.bs.modal", function (e) {
		$("#delete_location_id").val("");
		var location_id = $(e.relatedTarget).data("id");
		$("#delete_location_id").val(location_id);
	});

	// delete_location button click
	$("#delete_location").click(function () {
		var location_id = $("#delete_location_id").val();
		// submit the form
		$.ajax({
			url: base_url + "location/delete_location",
			type: "POST",
			dataType: "json",
			data: { id: location_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deleteLocationModal").modal("hide");
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
