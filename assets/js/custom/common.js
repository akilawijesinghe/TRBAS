// initiate datatable
$(document).ready(function () {
	$(".ams-data-table").DataTable();
});

function display_error(index, val) {
	var inputField = $("#" + index);
	var errorSpan = inputField.next(".error-message");
	// Check if the error span already exists, if not, create it
	if (errorSpan.length === 0) {
		inputField.after(
			'<span class="error-message" style="display:none;color:red;"></span>'
		);
		errorSpan = inputField.next(".error-message");
	}
	errorSpan.text(val).show();
}
