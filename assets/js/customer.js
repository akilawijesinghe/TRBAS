$(document).ready(function () {
	// save_customer button click and form submit
	$("#save_customer").click(function () {
		// remove all error messages
		$(".error-message").remove();
		// get the form data
		var formData = $("#customer_form").serializeArray();
		customer_id = $("#addCustomerModal").data("id");

		if (customer_id) {
			formData.push({ name: "id", value: customer_id });
		}
		// submit the form
		$.ajax({
			url: base_url + "customer/save_customer",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addCustomerModal").modal("hide");
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

	$("#addCustomerModal").on("show.bs.modal", function (e) {
		// clear error messages
		$(".error-message").remove();
		// get all data attributes into an array
		$("#customer_form")[0].reset();
		var data = $(e.relatedTarget).data();
		// remove all data attributes from the modal
		$("#addCustomerModal").removeData();
		// add all data attributes to the modal
		$("#addCustomerModal").data(data);

		if (e.relatedTarget) {
			$.each(data, function (index, val) {
				$("#" + index).val(val);
			});
		}
	});

	$("#deleteCustomerModal").on("show.bs.modal", function (e) {
		$("#delete_customer_id").val("");
		var customer_id = $(e.relatedTarget).data("id");
		$("#delete_customer_id").val(customer_id);
	});

	// delete_customer button click
	$("#delete_customer").click(function () {
		var customer_id = $("#delete_customer_id").val();

		$.ajax({
			url: base_url + "customer/delete_customer",
			type: "POST",
			dataType: "json",
			data: { id: customer_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deleteCustomerModal").modal("hide");
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
