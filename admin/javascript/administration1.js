$(document).ready(function() {

	var administrationList;

	function getAdministration() {
		$.ajax({
			url : '../admin/crud/Administration.php',
			method : 'POST',
			data : {GET_ADMINISTRATION:1},
			success : function(response) {
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var administrationHTML = '';

					administrationList = resp.message.administration;

					if (administrationList) {
						$.each(resp.message.administration, function(index, value) {

							administrationHTML += '<tr>'+
														'<td>'+''+'</td>'+
														'<td>'+ value.positionname +'</td>'+
														'<td>'+ value.areaname +'</td>'+
														'<td>'+ value.fullname +'</td>'+
														'<td>'+ value.professionalname +'</td>'+
														'<td><img width="60" height="60" src="../photos/'+value.image_+'"></td>'+
														'<td><a class="pencil edit-administration" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fa fa-pencil"></i></a>&nbsp;<a adminID="'+value.adminID+'" class="trash delete-administration" style="color:#fff;"><i class="fa fa-trash"></i></a></td>'+
													'</tr>';

						});

						$("#administration_list").html(administrationHTML);
					}

					var positionSelectHTML = '<option value="">Select Position</position>';
					$.each(resp.message.position, function(index, value){

						positionSelectHTML += '<option value="'+value.positionID+'">'+value.positionname+'</option>';
					});

					$(".position_list").html(positionSelectHTML);

					var areaSelectHTML = '<option value="">Select Area</option>';
					$.each(resp.message.area, function(index, value){

						areaSelectHTML += '<option value="'+value.areaID+'">'+value.areaname+'</option>';

					});

					$(".area_list").html(areaSelectHTML);
				}
			}
		});
	}

	getAdministration();

	$(".add-administration").on("click", function(){

		$.ajax({
			url : '../admin/crud/Administration.php',
			method : 'POST',
			data: new FormData($("#add_administration_form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add_administration_form").trigger("reset");
					$("#add_administration_modal").modal('hide');
					getAdministration();
				}
				else if(resp.status == 303){
					alert(resp.message);
				}
			}
		});
	});

	$(document.body).on('click', '.edit-administration', function(){
		console.log($(this).find('span').text());
		var administration = $.parseJSON($.trim($(this).find('span').text()));

		console.log(administration);

		$("input[name='e_fullname']").val(administration.fullname);
		$("input[name='e_professionalname']").val(administration.professionalname);
		$("input[name='e_positionID']").val(administration.positionID);
		$("input[name='e_areaID']").val(administration.areaID);
		$("input[name='e_image_']").siblings("img").attr("src","../photos"+administration.image_);
		$("input[name='e_adminID']").val(administration.adminID);
		$("#edit_administration_modal").modal('show');
	});

	$(".submit-edit-administration").on('click', function(){

		$.ajax({

			url : '../admin/crud/Administration.php',
			method : 'POST',
			data : new FormData($("#edit_administration_form")[0]),
			contentType : false,
			cache : false,
			processData: false,
			success : function(response) {
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit_administration_form").trigger("reset");
					$("#edit_administration_modal").modal('hide');
					getAdministration();
					alert(resp.message);
				}
				else if(resp.status == 303) {
					alert(resp.message);
				}
			}
		});

	});

	$(document.body).on('click', '.delete-administration', function(){

		var adminID = $(this).attr('adminID');
		if (confirm("Are you sure to delete this?")) {
			$.ajax({
				url : '../admin/crud/Administration.php',
				method : 'POST',
				data : {DELETE_ADMINISTRATION: 1, adminID:adminID},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getAdministration();
					}
					else if (resp.status == 303) {
						alert(resp.message);
					}
				}
			});
		}
		else {
			alert('Cancelled');
		}
	});
});