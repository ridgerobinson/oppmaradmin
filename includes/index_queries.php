<?php

//Preset Variables
	$feedcelloutput = '';
	$feedfiltersoutput = '';
	$feedcount = 0;
	$actionshot = '';
	$videoactionshot = '';
	$imageactionshot = '';
	$commentsbuttonoutput = '';

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

//Feed Image Settings
    $feedimagesettingsquery = "SELECT
    							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='video_feed_thumb') VideoFeedThumb,
    							(SELECT s.value FROM ".DB_NAME.".opp_settings s WHERE s.key='image_feed_thumb') ImageFeedThumb
    							";

	$feedimagesettingsresult = $mysqli->query($feedimagesettingsquery) or die($mysqli->error.__LINE__);

	while($feedimagesettingsrow = $feedimagesettingsresult->fetch_assoc()) {
    	$VideoFeedThumb = $feedimagesettingsrow['VideoFeedThumb'];
    	$ImageFeedThumb = $feedimagesettingsrow['ImageFeedThumb'];

    	if ($VideoFeedThumb == 'action_shot') {
    		$videoactionshot = '_action';
    	}

    	if ($ImageFeedThumb == 'action_shot') {
    		$imageactionshot = '_action';
    	}
    }

?>