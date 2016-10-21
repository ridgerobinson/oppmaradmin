<?php
//Variables
	$dayssinceoutput = '';
	$userstorybuttonsoutput = '';
	$membershipsoutput = '';
	$usersoutput = '';
	$userstoryinitprofilefieldsoutput = '';
	$userstoryinitprofileinputs = '';
	$addprofilefieldoutput = '';
	$allprofilequestionsoutput = '';

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

//Users Query
	$usersquery = "SELECT
						CONCAT(u.f_name,' ',u.l_name) UserName,
					    u.id UserID,
						u.thumb Thumbnail
					FROM ".MASTER_DB_NAME.".users u
					ORDER BY u.f_name";

	$usersresult = $mysqli->query($usersquery) or die($mysqli->error.__LINE__);

//Users
	if($usersresult->num_rows > 0) {
		while($usersrow = $usersresult->fetch_assoc()) {
			$usersoutput .= '<option value="'.$usersrow['UserID'].'">'.$usersrow['UserName'].'</option>';
		}
	}

//User Story Init Profile Fields Query
	$userstoryinitprofilefieldsquery = "SELECT
											t.en ProfileQuestion,
											t.key_locale TranslationKey,
											m.membership_name MembershipName,
											m.id MembershipID,
											md.id MembershipDataID,
											md.is_required IsRequired,
											md.is_enabled IsEnabled
										FROM ".DB_NAME."_master.memberships_data md
										JOIN ".DB_NAME."_master.memberships m ON md.membership_id = m.id
										JOIN ".DB_NAME.".opp_translations t ON md.name = t.key_locale
										WHERE m.id = ( SELECT MIN(m.id) First FROM ".DB_NAME."_master.memberships m )
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
			$firstmembershipid = $userstoryinitprofilefieldsrow['MembershipID'];

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
										    	<button type="button" class="btn btn-success edit" style="float:left; width:50%;" key="'.$userstoryinitprofilefieldsrow['TranslationKey'].'" rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'">Save</button>
										    	<button type="button" class="btn btn-danger remove" style="float:left; width:50%;" rel="'.$userstoryinitprofilefieldsrow['MembershipDataID'].'">Remove</button>
										    </div>
										    </div>
										    <div style="clear:both;"></div>';
		}
	} else {
		$userstoryinitprofilefieldsquery = "SELECT
												MIN(m.id) First,
												m.membership_name MembershipName
											FROM ".DB_NAME."_master.memberships m";

		$userstoryinitprofilefieldsresult = $mysqli->query($userstoryinitprofilefieldsquery) or die($mysqli->error.__LINE__);

		//User Story Init Profile Fields
			if($userstoryinitprofilefieldsresult->num_rows > 0) {
				while($userstoryinitprofilefieldsrow = $userstoryinitprofilefieldsresult->fetch_assoc()) {
					$firstmembership = $userstoryinitprofilefieldsrow['MembershipName'];
					$firstmembershipid = $userstoryinitprofilefieldsrow['First'];

					$userstoryinitprofileinputs = '<div style="width:100%; padding:5px;">The membership of '.$firstmembership.' has no profile fields for it. Add some now!</div>';
				}
			}
	}

//Add Profile Field
	$addprofilefieldquery = "SELECT
								t.en ProfileQuestion,
								t.key_locale TranslationKey
							FROM ".DB_NAME.".opp_translations t
							WHERE t.key_locale LIKE 'profile_%' &&
								  t.key_locale NOT IN (SELECT
															t.key_locale TranslationKey
														FROM ".DB_NAME.".opp_translations t
                            							LEFT JOIN ".DB_NAME."_master.memberships_data md ON t.key_locale = md.name
                                                		LEFT JOIN ".DB_NAME."_master.memberships m ON m.id = md.membership_id
														WHERE m.id = ( SELECT MIN(m.id) First FROM ".DB_NAME."_master.memberships m ))";

	$addprofilefieldresult = $mysqli->query($addprofilefieldquery) or die($mysqli->error.__LINE__);

	if($addprofilefieldresult->num_rows > 0) {
		while($addprofilefieldrow = $addprofilefieldresult->fetch_assoc()) {
			$addprofilefieldoutput .= '<option value="'.$addprofilefieldrow['TranslationKey'].'">'.$addprofilefieldrow['ProfileQuestion'].'</option>';
		}
	}

//Add Profile Field Modal Original Questions
	$allprofilequestionsquery = "SELECT
									t.en Translation
								FROM ".DB_NAME.".opp_translations t
								WHERE t.key_locale LIKE 'profile_%'";

	$allprofilequestionsresult = $mysqli->query($allprofilequestionsquery) or die($mysqli->error.__LINE__);

//Add Profile Field Modal Original Questions
	if($allprofilequestionsresult->num_rows > 0) {
		while($allprofilequestionsrow = $allprofilequestionsresult->fetch_assoc()) {
			$allprofilequestionsoutput .= '<option>'.$allprofilequestionsrow['Translation'].'</option>';
		}
	}


//Memberships Query
	$membershipsquery = "SELECT
							m.membership_name MembershipName,
							m.id MembershipID
						FROM ".MASTER_DB_NAME.".memberships m
						ORDER BY m.membership_name";

	$membershipsresult = $mysqli->query($membershipsquery) or die($mysqli->error.__LINE__);

//Memberships
	if($membershipsresult->num_rows > 0) {
		while($membershipsrow = $membershipsresult->fetch_assoc()) {
			if ($membershipsrow['MembershipID'] == $firstmembershipid) {
				$selected = 'selected';
			} else {
				$selected = '';
			}
			$membershipsoutput .= '<option value="'.$membershipsrow['MembershipID'].'" '.$selected.'>'.$membershipsrow['MembershipName'].'</option>';
		}
	}

?>