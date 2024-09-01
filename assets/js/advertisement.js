$(document).ready(function () {
	$(document).on("click", "#booking_table tr", function () {
		var booking_id = $(this).data("id");
		// clear booking_id input
		$("#bookingid").val("");
		// set booking_id input
		$("#bookingid").val(booking_id);
		// hide the ad table
		$("#ad_table_div").css("display", "none");

		$.ajax({
			url: base_url + "advertisement/get_adverts",
			type: "POST",
			data: { booking_id: booking_id },
		})
			.done(function (response) {
				$("#ad_table_div").css("display", "block");
				res = JSON.parse(response);
				if (res.data.length == 0) {
					$("#ad_table tbody").html(
						"<tr><td colspan='4'>No Advertisements</td></tr>"
					);
				} else {
					load_advertisements(booking_id);
				}
			})
			.fail(function (response) {
				console.log(response);
			})
			.always(function () {
				console.log("complete");
			});
	});

	$(document).on("click", "#delete_ad_link", function () {
		$("#delete_ad_modal").data("id", "");
		$("#delete_ad_modal").modal("show");
		var ad_id = $(this).data("id");
		$("#deleteAdModal").attr("data-id", ad_id);
	});

	// delete_ad click event
	$("#delete_ad").click(function () {
		var ad_id = $("#deleteAdModal").data("id");

		// ajax call to delete ad
		$.ajax({
			url: base_url + "advertisement/delete_ad",
			type: "POST",
			data: { id: ad_id },
		})
			.done(function (response) {
				res = JSON.parse(response);
				if (res.status == "success") {
					$("#deleteAdModal").modal("hide");
					var content = {};

					content.message = res.message;
					content.title = "Success";
					content.icon = "fa fa-bell";

					$.notify(content, {
						type: res.status,
						time: 1000,
						delay: 0,
					});
                    load_advertisements($("#bookingid").val());
				}
			})
			.fail(function (response) {
				console.log(response);
			})
			.always(function () {
				console.log("complete");
			});
	});
});

function load_advertisements(booking_id) {
	$.ajax({
		url: base_url + "advertisement/get_adverts",
		type: "POST",
		data: { booking_id: booking_id },
	})
		.done(function (response) {
			$("#ad_table_div").css("display", "block");
			res = JSON.parse(response);
			if (res.data.length == 0) {
				$("#ad_table tbody").html(
					"<tr><td colspan='4'>No Advertisements</td></tr>"
				);
			} else {
				$("#ad_table tbody").html("");
				console.log(res.data);
				$.each(res.data, function (index, val) {
					var tr = $("<tr>");
					tr.append("<td>" + val.id + "</td>");
					tr.append("<td>" + val.video_link + "</td>");

					//  action view and delete
					var action = $(
						"<td>" +
							'<a href="' +
							base_url +
							"advertisement/view_video/" +
							val.id +
							"/" +
							val.booking_id +
							'" target="_blank">View</a>' +
							" | " +
							'<a href="#" id="delete_ad_link" data-id="' +
							val.id +
							'" data-bs-toggle="modal" data-bs-target="#deleteAdModal">Delete</a>' +
							"</td>"
					);

					tr.append(action);

					$("#ad_table tbody").append(tr);
				});
			}
		})
		.fail(function (response) {
			console.log(response);
		})
		.always(function () {
			console.log("complete");
		});
}
