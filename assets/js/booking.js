$(document).ready(function () {
	// save_booking button click and form submit
	$("#save_booking").click(function () {
		// remove all error messages
		$(".error-message").remove();

		// removve disabled attribute from the form fields
		$("#price_package_id").prop("disabled", false);

		// get the form data
		var formData = $("#booking_form").serializeArray();
		booking_id = $("#addBookingModal").data("id");
		$("#price_package_id").prop("disabled", true);

		// remove from_daterange from the form data
		formData = formData.filter(function (item) {
			return item.name != "from_daterange";
		});

		if (booking_id) {
			formData.push({ name: "id", value: booking_id });
		}
		// submit the form
		$.ajax({
			url: base_url + "booking/save_booking",
			type: "POST",
			dataType: "json",
			data: formData,
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#addBookingModal").modal("hide");
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

	// billing_id change event display_total
	$("#billboard_id").change(function () {
		$("#from_daterange").prop("disabled", false);

		// if date range is not empty
		if ($("#from_daterange").val() != "") {
			var start_date = moment($("#from_date").val());
			var end_date = moment($("#to_date").val());
			display_total(start_date, end_date, "Custom");
		}
	});

	$("#addBookingModal").on("show.bs.modal", function (e) {
		//clear from_daterange input field
		$("#from_daterange").data("daterangepicker").setStartDate(moment());
		$("#from_daterange").data("daterangepicker").setEndDate(moment());
		$("#from_daterange").val("");
		// clear price-dev class
		$(".price-dev").html("");
		// clear error messages
		$(".error-message").remove();
		// get all data attributes into an array
		$("#booking_form")[0].reset();
		var data = $(e.relatedTarget).data();
		// remove all data attributes from the modal
		$("#addBookingModal").removeData();
		// add all data attributes to the modal
		$("#addBookingModal").data(data);

		// Populate other fields with data
		$.each(data, function (index, val) {
			$("#" + index).val(val);
		});

		if (data.from_date && data.to_date) {
			// Parse the dates using moment.js, ensuring that the format is correct
			var start_date = moment(data.from_date, "YYYY-MM-DD"); // Adjust the format as needed
			var end_date = moment(data.to_date, "YYYY-MM-DD"); // Adjust the format as needed

			// Set the start and end dates in the date range picker
			var daterangepicker = $("#from_daterange").data("daterangepicker");
			daterangepicker.setStartDate(start_date);
			daterangepicker.setEndDate(end_date);

			// set the valie of the from_daterange input field
			$("#from_daterange").val(
				start_date.format("MM/DD/YYYY") + " - " + end_date.format("MM/DD/YYYY")
			);
			display_total(start_date, end_date, "Custom");
		}
	});

	$("#deleteBookingModal").on("show.bs.modal", function (e) {
		$("#delete_booking_id").val("");
		var booking_id = $(e.relatedTarget).data("id");
		$("#delete_booking_id").val(booking_id);
	});

	// delete_booking button click
	$("#delete_booking").click(function () {
		var booking_id = $("#delete_booking_id").val();

		$.ajax({
			url: base_url + "booking/delete_booking",
			type: "POST",
			dataType: "json",
			data: { id: booking_id },
		})
			.done(function (res) {
				if (res.status == "success") {
					$("#deleteBookingModal").modal("hide");
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

	$("#price_package_id").change(function () {
		var price = $(this).find("option:selected").data("price");
		$("#total_price").val(price);
	});

	$(function () {
		$("#from_daterange").daterangepicker(
			{
				opens: "left",
				autoUpdateInput: false, // Prevent automatic input update
				minDate: moment(), // Start from today, adjust as needed
				showDropdowns: true, // Enable month and year dropdowns
				autoApply: false, // Disable auto apply to allow extended range selection
				locale: {
					format: "MM/DD/YYYY", // Format for the input field
					cancelLabel: "Clear", // Optional: Add a cancel button to clear the selection
				},
				setIsInvalidDate: function (date) {
					return false; // Initially allow all dates
				},
			},
			function (start, end, label) {
				display_total(start, end, label);
			}
		);

		// Optional: Clear the input when the cancel button is clicked
		$("#from_date").on("cancel.daterangepicker", function (ev, picker) {
			$(this).val("");
		});
	});

	function display_total(start, end, label) {
		// Update the input field with the selected date range
		$("#from_daterange").val(
			start.format("MM/DD/YYYY") + " - " + end.format("MM/DD/YYYY")
		);

		// Get the number of days between the start and end date
		var start_date = moment(start);
		var end_date = moment(end);
		var days = end_date.diff(start_date, "days") + 1; // Include the start date

		// set the start date and end date to the input field
		$("#from_date").val(start.format("YYYY-MM-DD"));
		$("#to_date").val(end.format("YYYY-MM-DD"));

		// Collect and sort all durations
		var durations = [];
		$("#price_package_id option").each(function () {
			durations.push($(this).data("duration"));
		});
		// sort in descending order
		durations.sort(function (a, b) {
			return b - a;
		});

		// Find the first duration that is less than or equal to the number of days
		var selectedOption = null;
		for (var i = 0; i < durations.length; i++) {
			if (days >= durations[i]) {
				selectedOption = $("#price_package_id option").filter(function () {
					return $(this).data("duration") == durations[i];
				});
				break;
			}
		}

		// get seleted billborad data-price variable
		var billboard_price = $("#billboard_id option:selected").data(
			"price_per_day"
		);

		if (selectedOption) {
			selectedOption.prop("selected", true);
		} else {
			$("#price_package_id option").each(function () {
				selectedOption = $(this);
			});
			selectedOption.prop("selected", true);
		}

		// Get the price and discount for the selected option
		var price = parseFloat(billboard_price);
		var discount = parseFloat(selectedOption.data("discount"));

		// Calculate the total price with discount applied
		var totalPrice = price * days;
		var discountAmount = (totalPrice * discount) / 100;
		var finalPrice = totalPrice - discountAmount;

		// Log the calculated values
		console.log("Price per day: " + price);
		console.log("Discount: " + discount + "%");
		console.log("Total price before discount: " + totalPrice);
		console.log("Discount amount: " + discountAmount);
		console.log("Final price after discount: " + finalPrice);

		// convert to 2 decimal places
		price = price.toFixed(2);
		totalPrice = totalPrice.toFixed(2);
		discountAmount = discountAmount.toFixed(2);
		finalPrice = finalPrice.toFixed(2);

		// display the price in price-dev class with the all price as a recept
		$(".price-dev").html(`
		 
		<div class="col-sm-12 price-dev">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted">Price per day:</span>
                <span class="font-weight-bold text-primary">$${price}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted">Total days:</span>
                <span class="font-weight-bold text-primary">${days}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted">Discount:</span>
                <span class="font-weight-bold text-success">${discount}%</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted">Total price before discount:</span>
                <span class="font-weight-bold text-warning">$${totalPrice}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted">Discount amount:</span>
                <span class="font-weight-bold text-danger">$${discountAmount}</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted">Final price after discount:</span>
                <span class="font-weight-bold text-success">$${finalPrice}</span>
            </div>
        </div>
    </div>
</div>
		 
		 `);
	}

	// billboard_id change event to get booking dates
	$("#billboard_id").change(function () {
		var billboard_id = $(this).val();
		var dates = get_booking_dates_of_billboard(billboard_id);
	});
});

function get_booking_dates_of_billboard(billboard_id) {
	$.ajax({
		url: base_url + "booking/get_booking_dates_of_billboard",
		type: "POST",
		dataType: "json",
		data: { billboard_id: billboard_id },
	})
		.done(function (res) {
			disable_dates(res);
		})
		.fail(function (data) {
			$.each(data.responseJSON, function (index, val) {
				display_error(index, val);
			});
		});
}

// Function to disable booked dates
function disable_dates(dates) {
	var picker = $("#from_daterange").data("daterangepicker");

	//add one day to the end date
	dates.forEach(function (date) {
		date.to_date = moment(date.to_date).add(1, "days").format("YYYY-MM-DD");
	});

	// Update the isInvalidDate function of the existing date range picker instance
	picker.isInvalidDate = function (date) {
		var formattedDate = date.format("YYYY-MM-DD");
		for (var i = 0; i < dates.length; i++) {
			var fromDate = moment(dates[i].from_date);
			var toDate = moment(dates[i].to_date);

			// If the date falls within any of the ranges, return true (invalid)
			if (date.isBetween(fromDate, toDate, null, "[]")) {
				return true;
			}
		}
		return false; // Otherwise, the date is valid
	};

	// Manually trigger the picker to re-render with the new invalid dates
	picker.updateView();
}
