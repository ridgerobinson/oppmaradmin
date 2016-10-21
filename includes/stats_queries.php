<?php
//Variables
	$dayssinceoutput = '';
	$feedcelloutput = '';
	$feedfiltersoutput = '';
	$feedcount = 0;
	$actionshot = '';
	$videoactionshot = '';
	$imageactionshot = '';
	$commentsbuttonoutput = '';
	$icon = '';
	$membershipsoutput = '';
	$categoriesoutput = '';
	$trendstopusersoutput = '';
	$usersoutput = '';

//All Feeds
	$allfeedsquery = "SELECT
						(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_heading') FeedScreenHeading,
						(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feed_item_comments_label') CommentButtonText,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_bg_c') CommentButtonBGColor,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_txt_c') CommentButtonTextColor,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_count_bg_c') CommentButtonCountBGColor,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_count_txt_c') CommentButtonCountTextColor,
						(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feed_item_follow_label') FollowButtonText,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_follow_txt_c') FollowButtonTextColor,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_follow_bg_c') FollowButtonBGColor,
                        (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='video_feed_thumb') VideoFeedThumb,
						(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='image_feed_thumb') ImageFeedThumb,
						f.id FeedID,
						u.id UserID,
					    u.thumb UserProfilePicture,
						f.unix_timestamp UnixTimestamp,
					    f.thumb Thumb,
					    f.message Message,
					    f.view_count ViewCount,
					    c.category CategoryName,
					    f.feed_type FeedType,
					    f.type Type,
					    CONCAT(u.f_name,' ',u.l_name) UserName,
					    (SELECT
							COUNT(f.user_id)
						FROM ".DB_NAME.".opp_followers f
					    WHERE f.user_id = UserID) Followers,
					    (SELECT
							COUNT(c.ref_id)
						FROM ".DB_NAME.".opp_comments c
					    WHERE c.ref_id = FeedID) CommentCount
					FROM ".DB_NAME.".opp_feeds f
					JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
					JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
					JOIN ".DB_NAME."_master.users u ON u.id = f.user_id
					WHERE f.feed_type!='1'
					GROUP BY f.id
					ORDER BY f.unix_timestamp DESC
					LIMIT 10;";

	$allfeedsresult = $mysqli->query($allfeedsquery) or die($mysqli->error.__LINE__);

    while($allfeedsrow = $allfeedsresult->fetch_assoc()) {
    	$userprofilepicture = $allfeedsrow['UserProfilePicture'];
		$thumbnail = $allfeedsrow['Thumb'];
		$message = $allfeedsrow['Message'];
		$categoryname = $allfeedsrow['CategoryName'];
		$date = gmdate("M d, Y", $allfeedsrow['UnixTimestamp']);
		$username = $allfeedsrow['UserName'];
		$followers = $allfeedsrow['Followers'];
		$viewcount = $allfeedsrow['ViewCount'];
		$commentcount = $allfeedsrow['CommentCount'];
		$feedtype = $allfeedsrow['FeedType'];
		$type = $allfeedsrow['Type'];
		$VideoFeedThumb = $allfeedsrow['VideoFeedThumb'];
    	$ImageFeedThumb = $allfeedsrow['ImageFeedThumb'];

    	//Comment Button
    		$CommentButtonText = $allfeedsrow['CommentButtonText'];
    		$CommentButtonBGColor = $allfeedsrow['CommentButtonBGColor'];
    		$CommentButtonTextColor = $allfeedsrow['CommentButtonTextColor'];
    		$CommentButtonCountBGColor = $allfeedsrow['CommentButtonCountBGColor'];
    		$CommentButtonCountTextColor = $allfeedsrow['CommentButtonCountTextColor'];
    	//Follow Button
	    	$FollowButtonText = $allfeedsrow['FollowButtonText'];
	    	$FollowButtonBGColor = $allfeedsrow['FollowButtonBGColor'];
	    	$FollowButtonTextColor = $allfeedsrow['FollowButtonTextColor'];

		$feedcount ++;

		//Feed Thumbnail
			if ($VideoFeedThumb == 'profile_picture' && $type == '1') {
				$feedthumbnail = $userprofilepicture;
			} else if ($ImageFeedThumb == 'profile_picture' && $type == '2') {
				$feedthumbnail = $userprofilepicture;
			} else if ($type == '3') {
				$feedthumbnail = $userprofilepicture;
			} else {
				$feedthumbnail = $thumbnail;
			}


		//Category (Name or Sponsored)
			if ($feedtype == '1') {
				$category = 'Sponsored';
			} else {
				$category = $categoryname;
			}
		//Feed Thumbnail Icon
			if ($type == '1') {
				$icon = 'video';
			} else if ($type == '2') {
				$icon = 'image';
			} else {
				$icon = 'text';
			}

    	$commentsbuttonoutput = '<span class="commentscount" bg="'.$CommentButtonCountBGColor.'" txt="'.$CommentButtonCountTextColor.'" style="color:#'.$CommentButtonCountTextColor.'; background-color:#'.$CommentButtonCountBGColor.'">'.$commentcount.'</span>';
    	$commentsbuttonoutput .= '<span class="commentsbuttontext" bg="'.$CommentButtonBGColor.'" txt="'.$CommentButtonTextColor.'" style="color:#'.$CommentButtonTextColor.'; background-color:#'.$CommentButtonBGColor.'">'.$CommentButtonText.'</span>';

    	$followbuttonoutput = '<span class="followicon"><i class="fa fa-users" aria-hidden="true"></i></span>';
    	$followbuttonoutput .= '<span class="followbuttontext follow" bg="'.$FollowButtonBGColor.'" txt="'.$FollowButtonTextColor.'" style="color:#'.$FollowButtonTextColor.'; background-color:#'.$FollowButtonBGColor.'">'.$FollowButtonText.'</span>';

		if ($message != '') {
			$message = '<div class="feedmessage">'.$message.'</div>';
		} else {
			$message = '<div class="emptyfeedmessage"></div>';
		}

		$feedcelloutput .= '
		<!-- Feed Cells -->
		<div class="feedcell col-lg-12">
			<!-- Feed User Info -->
				<div class="profile col-lg-4">
					<div class="feedthumbnail" style="max-width:100%;">
						<img src="'.$feedthumbnail.'">
						<img class="'.$icon.'icon" src="includes/images/feedicon_'.$icon.'.png">
					</div>
					<div class="username">'.$username.'</div>
					<div class="followers">Followers: '.$followers.'</div>
				</div>
			<!-- Feed Info -->
				<div class="feed col-lg-8">
					<div class="category">'.$category.'</div>
					'.$message.'
					<div class="feeddate">'.$date.'</div>
					<div class="commentsbutton pull-left" style="background-color:#'.$CommentButtonBGColor.';">
	 					'.$commentsbuttonoutput.'
	 				</div>					
	 				<div class="followbutton pull-right" style="background-color:#'.$FollowButtonBGColor.';">
	 					'.$followbuttonoutput.'
	 				</div>
				</div>
			<!-- Feed Footer -->
				<div class="feedfooter col-lg-12">
					<div class="viewcount pull-left">Views: '.$viewcount.'</div>
					<div class="trashicon pull-right col-lg-1">
						<span class="pull-right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></span>
					</div>
					<div class="shareicon pull-right col-lg-1">
						<span class="pull-right"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></span>
					</div>
				</div>
		</div>';
    }

//Feed Translations
    $feedtranslationsquery = "SELECT
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_heading') FeedScreenHeading,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feed_item_comments_label') CommentButtonText,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_bg_c') CommentButtonBGColor,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_txt_c') CommentButtonTextColor,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_count_bg_c') CommentButtonCountBGColor,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_comments_count_txt_c') CommentButtonCountTextColor,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feed_item_follow_label') FollowButtonText,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feed_item_unfollow_label') UnfollowButtonText,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_follow_txt_c') FollowButtonTextColor,
                                (SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_follow_bg_c') FollowButtonBGColor,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='Feeds_view_lable_No_of_Followers_txt') FollowersCountText,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='Feeds_view_lable_No_of_View_txt') ViewsCountText,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='common_search_bt') SearchBarTranslation,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='Feeds_view_lable_No_of_Followers_txt') FollowersTranslation,
    							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='Feeds_view_lable_No_of_View_txt') ViewsTranslation
    							";

	$feedtranslationsresult = $mysqli->query($feedtranslationsquery) or die($mysqli->error.__LINE__);

	while($feedtranslationsrow = $feedtranslationsresult->fetch_assoc()) {
    	$FeedScreenHeading = $feedtranslationsrow['FeedScreenHeading'];
    	$SearchBarTranslation = $feedtranslationsrow['SearchBarTranslation'];
    	$FollowersTranslation = $feedtranslationsrow['FollowersTranslation'];
    	$ViewsTranslation = $feedtranslationsrow['ViewsTranslation'];

    	//Comment Button
    		$CommentButtonText = $feedtranslationsrow['CommentButtonText'];
    		$CommentButtonBGColor = $feedtranslationsrow['CommentButtonBGColor'];
    		$CommentButtonTextColor = $feedtranslationsrow['CommentButtonTextColor'];
    		$CommentButtonCountBGColor = $feedtranslationsrow['CommentButtonCountBGColor'];
    		$CommentButtonCountTextColor = $feedtranslationsrow['CommentButtonCountTextColor'];
    	//Follow Button
	    	$FollowButtonText = $feedtranslationsrow['FollowButtonText'];
	    	$UnfollowButtonText = $feedtranslationsrow['UnfollowButtonText'];
	    	$FollowButtonBGColor = $feedtranslationsrow['FollowButtonBGColor'];
	    	$FollowButtonTextColor = $feedtranslationsrow['FollowButtonTextColor'];

    	$FollowersCountText = $feedtranslationsrow['FollowersCountText'];
    	$ViewsCountText = $feedtranslationsrow['ViewsCountText'];

    	$commentsbuttonoutput = '<span class="commentscount" bg="'.$CommentButtonCountBGColor.'" txt="'.$CommentButtonCountTextColor.'" style="color:#'.$CommentButtonCountTextColor.'; background-color:#'.$CommentButtonCountBGColor.'">#</span>';
    	$commentsbuttonoutput .= '<span class="commentsbuttontext" bg="'.$CommentButtonBGColor.'" txt="'.$CommentButtonTextColor.'" style="color:#'.$CommentButtonTextColor.'; background-color:#'.$CommentButtonBGColor.'">'.$CommentButtonText.'</span>';

    	$followbuttonoutput = '<span class="followicon"><i class="fa fa-users" aria-hidden="true"></i></span>';
    	$followbuttonoutput .= '<span class="followbuttontext follow" bg="'.$FollowButtonBGColor.'" txt="'.$FollowButtonTextColor.'" style="color:#'.$FollowButtonTextColor.'; background-color:#'.$FollowButtonBGColor.'">'.$FollowButtonText.'</span>';

    	$unfollowbuttonoutput = '<span class="followicon"><i class="fa fa-users" aria-hidden="true"></i></span>';
    	$unfollowbuttonoutput .= '<span class="followbuttontext unfollow" style="color:#'.$FollowButtonTextColor.'; background-color:#'.$FollowButtonBGColor.'">'.$UnfollowButtonText.'</span>';
	}

//Feed Filters
	$feedfiltersquery = "SELECT
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_all_feeds_tab_txt_c') AllFeedsTextColor,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_all_feeds_tab_bg_c') AllFeedsBGColor,
							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_all_feeds_tab') AllFeedsTranslation,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_followings_tag_txt_c') FollowingTextColor,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_followings_tag_bg_c') FollowingBGColor,
							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_followings_tag') FollowingTranslation,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_categories_tag_txt_c') CategoriesTextColor,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_categories_tag_bg_c') CategoriesBGColor,
							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_categories_tag') CategoriesTranslation,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_hashtags_tag_txt_c') HashtagsTextColor,
							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='feeds_screen_hashtags_tag_bg_c') HashtagsBGColor,
							(SELECT t.en FROM ".DB_NAME.".opp_translations t WHERE t.key_locale='feeds_screen_hashtags_tag') HashtagsTranslation";

	$feedfiltersresult = $mysqli->query($feedfiltersquery) or die($mysqli->error.__LINE__);

    while($feedfiltersrow = $feedfiltersresult->fetch_assoc()) {
    	//All Feeds Button
	    	$AllFeedsTextColor = $feedfiltersrow['AllFeedsTextColor'];
	    	$AllFeedsBGColor = $feedfiltersrow['AllFeedsBGColor'];
	    	$AllFeedsTranslation = $feedfiltersrow['AllFeedsTranslation'];
	    //Following Button
	    	$FollowingTextColor = $feedfiltersrow['FollowingTextColor'];
	    	$FollowingBGColor = $feedfiltersrow['FollowingBGColor'];
	    	$FollowingTranslation = $feedfiltersrow['FollowingTranslation'];
	    //Categories Button
	    	$CategoriesTextColor = $feedfiltersrow['CategoriesTextColor'];
	    	$CategoriesBGColor = $feedfiltersrow['CategoriesBGColor'];
	    	$CategoriesTranslation = $feedfiltersrow['CategoriesTranslation'];
	    //#hashtags Button
	    	$HashtagsTextColor = $feedfiltersrow['HashtagsTextColor'];
	    	$HashtagsBGColor = $feedfiltersrow['HashtagsBGColor'];
	    	$HashtagsTranslation = $feedfiltersrow['HashtagsTranslation'];

		$feedfiltersoutput .= '
		<button type="button" id="allfeedsfilter" bg="'.$AllFeedsBGColor.'" txt="'.$AllFeedsTextColor.'" class="btn" style="color:#'.$AllFeedsTextColor.'; background-color:#'.$AllFeedsBGColor.'">'.$AllFeedsTranslation.'</button>
		<button type="button" id="followingfilter" bg="'.$FollowingBGColor.'" txt="'.$FollowingTextColor.'" class="btn" style="color:#'.$FollowingTextColor.'; background-color:#'.$FollowingBGColor.'">'.$FollowingTranslation.'</button>
		<button type="button" id="categoriesfilter" bg="'.$CategoriesBGColor.'" txt="'.$CategoriesTextColor.'" class="btn" style="color:#'.$CategoriesTextColor.'; background-color:#'.$CategoriesBGColor.'">'.$CategoriesTranslation.'</button>
		<button type="button" id="hashtagsfilter" bg="'.$HashtagsBGColor.'" txt="'.$HashtagsTextColor.'" class="btn" style="color:#'.$HashtagsTextColor.'; background-color:#'.$HashtagsBGColor.'">'.$HashtagsTranslation.'</button>';
    }

//Days Since User Posted
    $dayssincequery = "SELECT
								a.PostingDate,
							    a.Days,
							    a.UserName
							FROM (SELECT
									u.id UserID,
									from_unixtime(f.unix_timestamp, '%M %D, %Y') PostingDate,
								    CONCAT(u.f_name,' ',u.l_name) UserName,
			      					datediff(from_unixtime(UNIX_TIMESTAMP()) , from_unixtime(f.unix_timestamp, '%Y-%m-%d %H:%i:%s')) Days
								FROM ".DB_NAME.".opp_feeds f
								JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
								JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
								JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
								WHERE f.feed_type!='1'
								GROUP BY f.id
								ORDER BY f.unix_timestamp DESC) a
							GROUP BY a.UserID
                            ORDER BY a.Days, a.UserName";

	$dayssinceresult = $mysqli->query($dayssincequery) or die($mysqli->error.__LINE__);

	while($dayssincerow = $dayssinceresult->fetch_assoc()) {
    	$PostingDate = $dayssincerow['PostingDate'];
    	$UserName = $dayssincerow['UserName'];
    	$Days = $dayssincerow['Days'];

	    $dayssinceoutput .= '<tr>';
	    $dayssinceoutput .= '<td>'.$UserName.'</td>';
	    $dayssinceoutput .= '<td>'.$PostingDate.'</td>';
	    $dayssinceoutput .= '<td style="text-align:right;">'.$Days.'</td>';
	    $dayssinceoutput .= '</tr>';
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
			$membershipsoutput .= '<option value="'.$membershipsrow['MembershipID'].'">'.$membershipsrow['MembershipName'].'</option>';
		}
	}

//Categories Query
	$categoriesquery = "SELECT
							c.category CategoryName,
							c.id CategoryID
						FROM ".DB_NAME.".opp_categories c
						ORDER BY c.category";

	$categoriesresult = $mysqli->query($categoriesquery) or die($mysqli->error.__LINE__);

//Categories
	if($categoriesresult->num_rows > 0) {
		while($categoriesrow = $categoriesresult->fetch_assoc()) {
			$categoriesoutput .= '<option value="'.$categoriesrow['CategoryID'].'">'.$categoriesrow['CategoryName'].'</option>';
		}
	}

//Trends
	//Top Users
		$trendstopusersquery="SELECT
								a.UserName UserName,
								COUNT(*) Feeds
							FROM (SELECT
									f.id FeedID,
									u.id UserID,
									from_unixtime(f.unix_timestamp, '%M %D, %Y') PostingDate,
								    f.message Message,
								    c.category CategoryName,
								    CONCAT(u.f_name,' ',u.l_name) UserName,
			      					datediff(from_unixtime(UNIX_TIMESTAMP()) , from_unixtime(f.unix_timestamp, '%Y-%m-%d %H:%i:%s')) Days
								FROM ".DB_NAME.".opp_feeds f
								JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
								JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
								JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
								WHERE f.feed_type!='1'
								GROUP BY f.id
								ORDER BY f.unix_timestamp DESC) a
                                GROUP BY a.UserID
                            ORDER BY Feeds desc, a.UserName
                            LIMIT 10";

        $trendstopusersresult = $mysqli->query($trendstopusersquery) or die($mysqli->error.__LINE__);

        if($trendstopusersresult->num_rows > 0) {
			while($trendstopusersrow = $trendstopusersresult->fetch_assoc()) {
				$trendstopusersoutput .= '<p>'.$trendstopusersrow['UserName'].' has '.$trendstopusersrow['Feeds'].' feeds</p>';
				$users[] = $trendstopusersrow['UserName'];
				$feeds[] = $trendstopusersrow['Feeds'];
			}
		}

?>

<script type="text/javascript">
	$(document).ready(function() {

		var topusers = new Highcharts.Chart({
			chart: {
				renderTo: 'trendstopusers',
				type: 'bar'
			},
			credits: {
	            text: 'OppMar.com',
	            href: 'http://www.oppmar.com'
	        },
			title: {
				text: 'Top Users'
			},
			xAxis: {
				categories: ['<?php echo join($users, "','") ?>']
			},
			yAxis: {
				title: {
					text: 'Count'
			 	},
				tickInterval: 1
			},
			series: [
				{
					name: 'Number of Feeds',
			 		data: [<?php echo join($feeds, ',') ?>]
				}
			]
		});

	});
</script>