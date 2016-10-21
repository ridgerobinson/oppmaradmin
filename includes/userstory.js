$(document).ready(function() {

	//Collapsing
		//User Story Search Area
			$('#userstorysearchsearchheader').on('click', function() {
				$('#userstorysearchform').toggle();
				if ($('#userstorysearchform').css('display') == 'none') {
					$(this).text('Show Search Options');
				} else {
					$(this).text('Hide Search Options');
				}
			});

	//User Story Profile Fields Form
		//Is Enabled
			$('#userstorycontent').on('change', '.enabled', function() {
				if ($(this).val() == '0') {
					$("div[rel='"+$(this).attr('rel')+"']").hide();
				} else {
					$("div[rel='"+$(this).attr('rel')+"']").show();
				}
			});
		//Profile Text
			$('#userstorycontent').on('keyup', 'input[type="text"]', function() {
				$("label[rel='"+$(this).attr('id')+"']").text($(this).val());
			});
		//Edit Button
			$('#userstorycontent').on('click', '.edit', function() {
				var id = $(this).attr('rel');
				var required = $("select[id='"+id+"_required']").val();
				var enabled = $("select[id='"+id+"_enabled']").val();
				var edit = 'edit';
				var translation = $("input[id='"+id+"']").val();
				var key = $(this).attr('key');

				$.ajax({
					url: 'userstory_ajax.php',
					data: {
						edit:edit,
						id:id,
						required:required,
						enabled:enabled,
						translation:translation,
						key:key
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							$('#message').html(result.message);
						}
					}
				});
			});
		//Remove Button
			$('#userstorycontent').on('click', '.remove', function() {
				var membershipdataid = $(this).attr('rel');
				var remove = 'remove';
				var changeofmembership = 'changeofmembership';
				var id = $('#userstorysearchform #userstorymembership').val();

				$.ajax({
					url: 'userstory_ajax.php',
					data: {
						remove:remove,
						membershipdataid:membershipdataid,
						changeofmembership:changeofmembership,
						id:id
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							$('#message').html(result.message);
							$('#userstoryprofileinputs').html(result.userstoryinitprofileinputs);
							$('#userstoryprofileinfo').html(result.userstoryinitprofilefieldsoutput);
							$('.userprofileusermembership').html(result.firstmembership);
							$('#userstorymembershiptype').html(result.firstmembership);
							$('#userstoryaddprofilefield').html(result.addprofilefieldoutput);
							$('.selectpicker').selectpicker('render');
							$('.selectpicker').selectpicker('refresh');
						}
					}
				});
			});
		//Change of Membership
			$('#userstorysearchform').on('change', '#userstorymembership', function() {
				var id = $(this).val();
				var changeofmembership = 'changeofmembership';

				$.ajax({
					url: 'userstory_ajax.php',
					data: {
						changeofmembership:changeofmembership,
						id:id
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							$('#userstoryprofileinputs').html(result.userstoryinitprofileinputs);
							$('#userstoryprofileinfo').html(result.userstoryinitprofilefieldsoutput);
							$('.userprofileusermembership').html(result.firstmembership);
							$('#userstorymembershiptype').html(result.firstmembership);
							$('#userstoryaddprofilefield').html(result.addprofilefieldoutput);
							$('.selectpicker').selectpicker('render');
							$('.selectpicker').selectpicker('refresh');
						}
					}
				});
			});
		//Add Profile Field
			$('#addprofilefield').on('click', function(e) {
				e.preventDefault();
				var addprofilefield = 'addprofilefield';
				var userstoryaddprofilefield = $('#userstoryaddprofilefield').val();
				var membershipid = $('#userstorymembership').val();
				var changeofmembership = 'changeofmembership';
				var id = $('#userstorysearchform #userstorymembership').val();

				$.ajax({
					url: 'userstory_ajax.php',
					data: {
						addprofilefield:addprofilefield,
						userstoryaddprofilefield:userstoryaddprofilefield,
						membershipid:membershipid,
						id:id,
						changeofmembership:changeofmembership
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							$('#userstoryprofileinputs').html(result.userstoryinitprofileinputs);
							$('#userstoryprofileinfo').html(result.userstoryinitprofilefieldsoutput);
							$('.userprofileusermembership').html(result.firstmembership);
							$('#userstorymembershiptype').html(result.firstmembership);
							$('#userstoryaddprofilefield').html(result.addprofilefieldoutput);
							$('.selectpicker').selectpicker('render');
							$('.selectpicker').selectpicker('refresh');
						}
					}
				});
			});
		//Create Profile Field
			$('#createprofilefieldsubmit').on('click', function() {
				var createprofilefield = 'createprofilefield';
				var createprofilefieldname = $('#createprofilefieldname').val();
				var createprofilefieldlabel = $('#createprofilefieldlabel').val();
				var changeofmembership = 'changeofmembership';
				var id = $('#userstorysearchform #userstorymembership').val();

				$.ajax({
					url: 'userstory_ajax.php',
					data: {
						createprofilefield:createprofilefield,
						createprofilefieldname:createprofilefieldname,
						createprofilefieldlabel:createprofilefieldlabel,
						changeofmembership:changeofmembership,
						id:id
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							if (result.message == 'close') {
								$('#userstoryaddprofilefield').html(result.addprofilefieldoutput);
								$('#addprofilefieldmodal').modal('hide');
								$('#allprofilequestionsoutput').html(result.allprofilequestionsoutput);
								$('#createprofilefieldname').val('');
								$('#createprofilefieldlabel').val('');								
								$('.selectpicker').selectpicker('render');
								$('.selectpicker').selectpicker('refresh');
							} else {
								$('#addprofilefieldmodal div.warning').html(result.message);
							}
						}
					}
				});
			});

});