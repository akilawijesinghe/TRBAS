$(document).ready(function () {
	// save_billboard button click and form submit
	$("#save_billboard").click(function () {
		// remove all error messages
		$(".error-message").remove();
		// get the form data
		var formData = $("#billboard_form").serializeArray();
		billboard_id = $("#addBillboardModal").data("id");

		if (billboard_id) {
			formData.push({ name: "id", value: billboard_id });
		}
		// submit the form
		$.ajax({
			url: base_url + "billboard/save_billboard",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addBillboardModal").modal("hide");
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

	$("#addBillboardModal").on("show.bs.modal", function (e) {
		// clear error messages
		$(".error-message").remove();
		// get all data attributes into an array
		$("#billboard_form")[0].reset();
		var data = $(e.relatedTarget).data();
		// remove all data attributes from the modal
		$("#addBillboardModal").removeData();
		// add all data attributes to the modal
		$("#addBillboardModal").data(data);
		if (e.relatedTarget) {
			$.each(data, function (index, val) {
				$("#" + index).val(val);
			});
		}
	});

	$("#deleteBillboardModal").on("show.bs.modal", function (e) {
		$("#delete_billboard_id").val("");
		var billboard_id = $(e.relatedTarget).data("id");
		$("#delete_billboard_id").val(billboard_id);
	});

	// delete_billboard button click
	$("#delete_billboard").click(function () {
		var billboard_id = $("#delete_billboard_id").val();

		$.ajax({
			url: base_url + "billboard/delete_billboard",
			type: "POST",
			dataType: "json",
			data: { id: billboard_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deleteBillboardModal").modal("hide");
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
