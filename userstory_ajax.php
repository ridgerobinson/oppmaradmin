<?php include('includes/database.php'); ?>
<?php

//Variables
	$userstoryinitprofilefieldsoutput = '';
	$userstorybuttonsoutput = '';
	$userstoryinitprofileinputs = '';
	$message = '';
	$firstmembership = '';
	$addprofilefieldoutput = '';
	$allprofilequestionsoutput = '';

//Setting Queries
	//Additional Translations
	    $additionaltranslationsquery = "SELECT
		    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='title_user_story') FeedScreenHeading,
		    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='common_search_bt') SearchBarTranslation";

		$additionaltranslationsresult = $mysqli->query($additionaltranslationsquery) or die($mysqli->error.__LINE__);

		while($additionaltranslationsrow = $additionaltranslationsresult->fetch_assoc()) {
	    	$FeedScreenHeading = $additionaltranslationsrow['FeedScreenHeading'];
	    	$SearchBarTranslation = $additionaltranslationsrow['SearchBarTranslation'];
		}

	//User Story Buttons
		$userstorybuttonsquery = "SELECT
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_page_unselected_bg_c') UserStoryTabUnselectedBGColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_page_selected_bg_c') UserStoryTabSelectedBGColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_page_unselected_txt_c') UserStoryTabUnselectedTxtColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_page_selected_txt_c') UserStoryTabSelectedTxtColor,
								(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='user_story_tab') UserStoryTabTranslation,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_feed_page_unselected_bg_c') UserFeedTabUnselectedBGColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_feed_page_selected_bg_c') UserFeedTabSelectedBGColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_feed_page_unselected_tx_c') UserFeedTabUnselectedTxtColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_feed_page_selected_tx_c') UserFeedTabSelectedTxtColor,
								(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='user_feed_tab') UserFeedTabTranslation,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_fullstory_bt_bg_c') FullStoryButtonBGColor,
								(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='user_story_fullstory_bt_tx_c') FullStoryButtonTxtColor,
								(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='full_story') FullStoryButtonTranslation";

		$userstorybuttonsresult = $mysqli->query($userstorybuttonsquery) or die($mysqli->error.__LINE__);

	    while($userstorybuttonsrow = $userstorybuttonsresult->fetch_assoc()) {
	    	//User Story
		    	$UserStoryTabUnselectedBGColor = $userstorybuttonsrow['UserStoryTabUnselectedBGColor'];
		    	$UserStoryTabSelectedBGColor = $userstorybuttonsrow['UserStoryTabSelectedBGColor'];
		    	$UserStoryTabUnselectedTxtColor = $userstorybuttonsrow['UserStoryTabUnselectedTxtColor'];
		    	$UserStoryTabSelectedTxtColor = $userstorybuttonsrow['UserStoryTabSelectedTxtColor'];
		    	$UserStoryTabTranslation = $userstorybuttonsrow['UserStoryTabTranslation'];
		    //User Story
		    	$UserFeedTabUnselectedBGColor = $userstorybuttonsrow['UserFeedTabUnselectedBGColor'];
		    	$UserFeedTabSelectedBGColor = $userstorybuttonsrow['UserFeedTabSelectedBGColor'];
		    	$UserFeedTabUnselectedTxtColor = $userstorybuttonsrow['UserFeedTabUnselectedTxtColor'];
		    	$UserFeedTabSelectedTxtColor = $userstorybuttonsrow['UserFeedTabSelectedTxtColor'];
		    	$UserFeedTabTranslation = $userstorybuttonsrow['UserFeedTabTranslation'];
		    //Full Story
		    	$FullStoryButtonBGColor = $userstorybuttonsrow['FullStoryButtonBGColor'];
		    	$FullStoryButtonTxtColor = $userstorybuttonsrow['FullStoryButtonTxtColor'];
		    	$FullStoryButtonTranslation = $userstorybuttonsrow['FullStoryButtonTranslation'];

			$userstorybuttonsoutput .= '
			<button type="button" id="userstorytab" class="btn" style="color:#'.$UserStoryTabSelectedTxtColor.'; background-color:#'.$UserStoryTabSelectedBGColor.'">'.$UserStoryTabTranslation.'</button>
			<button type="button" id="userfeedtab" class="btn" style="color:#'.$UserFeedTabUnselectedTxtColor.'; background-color:#'.$UserFeedTabUnselectedBGColor.'">'.$UserFeedTabTranslation.'</button>';
	    }

//User Story Profile
	//Edit
		if(!empty($_POST['edit'])) {
			$id = $_POST['id'];
			$required = $_POST['required'];
			$enabled = $_POST['enabled'];
			$translation = $_POST['translation'];
			$key = $_POST['key'];

			if ($translation != '') {
				//Membership Data
					$query="UPDATE oppmar_dev_master.memberships_data
							SET
								is_required='".$required."',
								is_enabled='".$enabled."'
							WHERE id=".$id."";

					$mysqli->query($query);
				//Translation
					$query="UPDATE oppmar_dev.opp_translations
							SET
								en='".$translation."'
							WHERE key_locale='".$key."'";

					$mysqli->query($query);

				$message = '<div class="alert alert-success alert-dismissible fade in successmessage" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							  Your changes have been successfully saved.
							</div>';
			} else {
				$message = '<div class="alert alert-warning alert-dismissible fade in errormessage" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							  Your must enter a value for the profile label
							</div>';
			}
		}
	//Remove
		if(!empty($_POST['remove'])) {
			$membershipdataid = $_POST['membershipdataid'];

			$query="DELETE FROM oppmar_dev_master.memberships_data WHERE id='$membershipdataid'";

			$mysqli->query($query);
		}
	//Add Profile Field
		if(!empty($_POST['addprofilefield'])) {
			$userstoryaddprofilefield = $_POST['userstoryaddprofilefield'];
			$membershipid = $_POST['membershipid'];

			$userstoryaddprofilefieldCount = count($userstoryaddprofilefield);
			for($i=0;$i<$userstoryaddprofilefieldCount;$i++) {
				$query = "INSERT INTO oppmar_dev_master.memberships_data (membership_id, name, is_required, is_enabled)
						  VALUES ('$membershipid', '$userstoryaddprofilefield[$i]', '1', '1')";
				
				$mysqli->query($query);
			}
		}
	//Create Profile Field
		if(!empty($_POST['createprofilefield'])) {
			$createprofilefieldname = 'profile_'.$_POST['createprofilefieldname'];
			$createprofilefieldlabel = $_POST['createprofilefieldlabel'];

			$checkifcreateprofileexistsquery = "SELECT
													COUNT(t.en) DoesExist
												FROM oppmar_dev.opp_translations t
												WHERE t.key_locale = '$createprofilefieldname'";
			$checkifcreateprofileexistsresult = $mysqli->query($checkifcreateprofileexistsquery) or die($mysqli->error.__LINE__);

			if($checkifcreateprofileexistsresult->num_rows > 0) {
				while($checkifcreateprofileexistsrow = $checkifcreateprofileexistsresult->fetch_assoc()) {
					if ($checkifcreateprofileexistsrow['DoesExist'] > 0) {
						$message = 'Profile Name already exists. Please choose another name';
					} else {
						if (($createprofilefieldname == 'profile_') || $createprofilefieldlabel == '') {
							$message = 'Please add both the Profile Field Name and the Profile Field Label';
						} else {
							if (preg_match('/\s/',$createprofilefieldname)) {
								$message = 'Please remove any spaces from the Profile Field Name';
							} else {
								$query = "INSERT INTO oppmar_dev.opp_translations (key_locale, en)
									  	  VALUES ('$createprofilefieldname', '$createprofilefieldlabel')";
								
								$mysqli->query($query);
								$message = 'close';
							}
						}
					}
				}
			}

			//Add Profile Field Modal Original Questions
				$allprofilequestionsquery = "SELECT
												t.en Translation
											FROM oppmar_dev.opp_translations t
											WHERE t.key_locale LIKE 'profile_%'";

				$allprofilequestionsresult = $mysqli->query($allprofilequestionsquery) or die($mysqli->error.__LINE__);

			//Add Profile Field Modal Original Questions
				if($allprofilequestionsresult->num_rows > 0) {
					while($allprofilequestionsrow = $allprofilequestionsresult->fetch_assoc()) {
						$allprofilequestionsoutput .= '<option>'.$allprofilequestionsrow['Translation'].'</option>';
					}
				}
		}
	//Change of Membership
		//User Story Init Profile Fields Query
			if(!empty($_POST['changeofmembership'])) {
				$membershipid = $_POST['id'];
				$userstoryinitprofilefieldsquery = "SELECT
														t.en ProfileQuestion,
														t.key_locale TranslationKey,
														m.membership_name MembershipName,
														md.id MembershipDataID,
														md.is_required IsRequired,
														md.is_enabled IsEnabled
													FROM oppmar_dev_master.memberships_data md
													JOIN oppmar_dev_master.memberships m ON md.membership_id = m.id
													JOIN oppmar_dev.opp_translations t ON md.name = t.key_locale
													WHERE m.id = $membershipid
													GROUP BY md.name
													ORDER BY m.id";

				$userstoryinitprofilefieldsresult = $mysqli->query($userstoryinitprofilefieldsquery) or die($mysqli->error.__LINE__);

				//User Story Init Profile Fields
					if($userstoryinitprofilefieldsresult->num_rows > 0) {
						while($userstoryinitprofilefieldsrow = $userstoryinitprofilefieldsresult->fetch_assoc()) {
							//Variables
									$required = '';
									$notrequired = '';
									$enabled = '';
									$disabled = '';
									$style = '';

							$firstmembership = $userstoryinitprofilefieldsrow['MembershipName'];

							//User Story Live Demo
								if ($userstoryinitprofilefieldsrow['IsEnabled'] == '0') {
									$style = 'style="display:none;"';
								}
								$userstoryinitprofilefieldsoutput .= '<div rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'" '.$style.'>';
								$userstoryinitprofilefieldsoutput .= '<label rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'">'.$userstoryinitprofilefieldsrow['ProfileQuestion'].'</label>';
								$userstoryinitprofilefieldsoutput .= '<div class="userstoryprofileanswer">
																		<div class="userstoryprofilefield"></div>
																		<div class="fullstorybutton" style="background-color: #'.$FullStoryButtonBGColor.'; color: #'.$FullStoryButtonTxtColor.'">'.$FullStoryButtonTranslation.'</div>
																	</div>';
								$userstoryinitprofilefieldsoutput .= '</div>';
							
							//Pre-Select Dropdowns
								//Required?
									if ($userstoryinitprofilefieldsrow['IsRequired'] == '1') {
										$required = 'selected';
									} else {
										$notrequired = 'selected';
									}
								//Enabled?
									if ($userstoryinitprofilefieldsrow['IsEnabled'] == '1') {
										$enabled = 'selected';
									} else {
										$disabled = 'selected';
									}
							$userstoryinitprofileinputs .= '<div style="width:100%;">
															<div class="form-group userstory" style="width:50%; float:left;">
																<label>Profile Label</label><br />
																<input id="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'" type="text" class="form-control" value="'.$userstoryinitprofilefieldsrow['ProfileQuestion'].'">
															</div>
															<div class="form-group dropdowns" style="width:15%; float:left;">
																<label>Is Required?</label><br />
																<select class="required selectpicker" id="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'_required" data-width="100%">
																	<option value="1" '.$required.'>Yes</option>
																	<option value="0" '.$notrequired.'>No</option>
																</select>
														    </div>
														    <div class="form-group dropdowns" style="width:15%; float:left;">
																<label>Is Enabled?</label><br />
																<select class="enabled selectpicker" rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'" id="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'_enabled" data-width="100%">
																	<option value="1" '.$enabled.'>Yes</option>
																	<option value="0" '.$disabled.'>No</option>
																</select>
														    </div>
														    <div class="form-group submitbuttons" style="float:left; width:20%;">
														    	<label>Options</label><br />
														    	<button type="button" class="btn btn-success edit" style="float:left; width:50%;" key="'.$userstoryinitprofilefieldsrow['TranslationKey'].'" rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'">Edit</button>
														    	<button type="button" class="btn btn-danger remove" style="float:left; width:50%;" rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'">Remove</button>
														    </div>
														    </div>
														    <div style="clear:both;"></div>';
						}
					} else {
						$userstoryinitprofilefieldsquery = "SELECT
																m.membership_name MembershipName
															FROM ".DB_NAME."_master.memberships m
															WHERE m.id = $membershipid";

						$userstoryinitprofilefieldsresult = $mysqli->query($userstoryinitprofilefieldsquery) or die($mysqli->error.__LINE__);

						//User Story Init Profile Fields
							if($userstoryinitprofilefieldsresult->num_rows > 0) {
								while($userstoryinitprofilefieldsrow = $userstoryinitprofilefieldsresult->fetch_assoc()) {
									$firstmembership = $userstoryinitprofilefieldsrow['MembershipName'];

									$userstoryinitprofileinputs = '<div style="width:100%; padding:5px;">The membership of '.$firstmembership.' has no profile fields for it. Add some now!</div>';
								}
							}
					}
				//Add Profile Field
					$addprofilefieldquery = "SELECT
												t.en ProfileQuestion,
												t.key_locale TranslationKey
											FROM oppmar_dev.opp_translations t
											WHERE t.key_locale LIKE 'profile_%' &&
												  t.key_locale NOT IN (SELECT
																			t.key_locale TranslationKey
																		FROM oppmar_dev.opp_translations t
				                            							LEFT JOIN oppmar_dev_master.memberships_data md ON t.key_locale = md.name
				                                                		LEFT JOIN oppmar_dev_master.memberships m ON m.id = md.membership_id
																		WHERE m.id = $membershipid)";

					$addprofilefieldresult = $mysqli->query($addprofilefieldquery) or die($mysqli->error.__LINE__);

					if($addprofilefieldresult->num_rows > 0) {
						while($addprofilefieldrow = $addprofilefieldresult->fetch_assoc()) {
							$addprofilefieldoutput .= '<option value="'.$addprofilefieldrow['TranslationKey'].'">'.$addprofilefieldrow['ProfileQuestion'].'</option>';
						}
					}
			}
//Results
    $data = array(
		'message' => $message,
		'userstoryinitprofilefieldsoutput' => $userstoryinitprofilefieldsoutput,
		'userstoryinitprofileinputs' => $userstoryinitprofileinputs,
		'firstmembership' => $firstmembership,
		'addprofilefieldoutput' => $addprofilefieldoutput,
		'allprofilequestionsoutput' => $allprofilequestionsoutput
	);

	echo json_encode($data);

?>