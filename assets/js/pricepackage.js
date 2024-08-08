$(document).ready(function () {
	// save_pricepackage button click and form submit
	$("#save_pricepackage").click(function () {
		// remove all error messages
		$(".error-message").remove();
		// get the form data
		var formData = $("#pricepackage_form").serializeArray();
		pricepackage_id = $("#addpricepackageModal").data("id");

		if (pricepackage_id) {
			formData.push({ name: "id", value: pricepackage_id });
		}
		// submit the form
		$.ajax({
			url: base_url + "pricepackage/save_pricepackage",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addpricepackageModal").modal("hide");
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

	$("#addpricepackageModal").on("show.bs.modal", function (e) {
		// clear error messages
		$(".error-message").remove();
		// get all data attributes into an array
		$("#pricepackage_form")[0].reset();
		var data = $(e.relatedTarget).data();
		// remove all data attributes from the modal
		$("#addpricepackageModal").removeData();
		// add all data attributes to the modal
		$("#addpricepackageModal").data(data);
		if (e.relatedTarget) {
			$.each(data, function (index, val) {
				$("#" + index).val(val);
			});
		}
	});

	$("#deletepricepackageModal").on("show.bs.modal", function (e) {
		$("#delete_pricepackage_id").val("");
		var pricepackage_id = $(e.relatedTarget).data("id");
		$("#delete_pricepackage_id").val(pricepackage_id);
	});

	// delete_pricepackage button click
	$("#delete_pricepackage").click(function () {
		var pricepackage_id = $("#delete_pricepackage_id").val();

		$.ajax({
			url: base_url + "pricepackage/delete_pricepackage",
			type: "POST",
			dataType: "json",
			data: { id: pricepackage_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deletepricepakageModal").modal("hide");
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
