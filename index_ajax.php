<?php include('includes/database.php'); ?>
<?php
$error = '';

	if(!empty($_POST['formsubmit'])) {
		//Variables
			//All Feeds Filter
				$new_allfeedsfilter_text = $_POST['new_allfeedsfilter_text'];
				$new_allfeedsfilter_text_color = $_POST['new_allfeedsfilter_text_color'];
				$new_allfeedsfilter_bg_color = $_POST['new_allfeedsfilter_bg_color'];
			//Following Filter
				$new_followingfilter_text = $_POST['new_followingfilter_text'];
				$new_followingfilter_text_color = $_POST['new_followingfilter_text_color'];
				$new_followingfilter_bg_color = $_POST['new_followingfilter_bg_color'];
			//Categories Filter
				$new_categoriesfilter_text = $_POST['new_categoriesfilter_text'];
				$new_categoriesfilter_text_color = $_POST['new_categoriesfilter_text_color'];
				$new_categoriesfilter_bg_color = $_POST['new_categoriesfilter_bg_color'];
			//Hashtags Filter
				$new_hashtagsfilter_text = $_POST['new_hashtagsfilter_text'];
				$new_hashtagsfilter_text_color = $_POST['new_hashtagsfilter_text_color'];
				$new_hashtagsfilter_bg_color = $_POST['new_hashtagsfilter_bg_color'];
		//Social
			//Comments
				$new_commentsbutton_text = $_POST['new_commentsbutton_text'];
				$new_commentsbutton_bg_color = $_POST['new_commentsbutton_bg_color'];
				$new_commentsbutton_text_color = $_POST['new_commentsbutton_text_color'];
				$new_commentsbuttoncount_bg_color = $_POST['new_commentsbuttoncount_bg_color'];
				$new_commentsbuttoncount_text_color = $_POST['new_commentsbuttoncount_text_color'];
			//Following
				$new_followbutton_text = $_POST['new_followbutton_text'];
				$new_unfollowbutton_text = $_POST['new_unfollowbutton_text'];
				$new_followbutton_bg_color = $_POST['new_followbutton_bg_color'];
				$new_followbutton_text_color = $_POST['new_followbutton_text_color'];
		//Additional Settings
			//Feed Thumnails
				$new_videofeed_thumbnail = $_POST['new_videofeed_thumbnail'];
				$new_imagefeed_thumbnail = $_POST['new_imagefeed_thumbnail'];
			//Other Settings
				$new_screenheading_text = $_POST['new_screenheading_text'];
				$new_searchbar_text = $_POST['new_searchbar_text'];
				$new_followers_text = $_POST['new_followers_text'];
				$new_views_text = $_POST['new_views_text'];

		if ((!empty($new_allfeedsfilter_text)) &&
			(!empty($new_followingfilter_text)) &&
			(!empty($new_categoriesfilter_text)) &&
			(!empty($new_hashtagsfilter_text)) &&
			(!empty($new_commentsbutton_text)) &&
			(!empty($new_followbutton_text)) &&
			(!empty($new_unfollowbutton_text)) &&
			(!empty($new_screenheading_text)) &&
			(!empty($new_searchbar_text)) &&
			(!empty($new_followers_text)) &&
			(!empty($new_views_text))) {
			//Translations
				$translationquery="UPDATE opp_translations
									SET en=CASE
										WHEN key_locale='feeds_screen_all_feeds_tab' THEN '".$new_allfeedsfilter_text."'
										WHEN key_locale='feeds_screen_followings_tag' THEN '".$new_followingfilter_text."'
										WHEN key_locale='feeds_screen_categories_tag' THEN '".$new_categoriesfilter_text."'
										WHEN key_locale='feeds_screen_hashtags_tag' THEN '".$new_hashtagsfilter_text."'
										WHEN key_locale='feed_item_comments_label' THEN '".$new_commentsbutton_text."'
										WHEN key_locale='feed_item_follow_label' THEN '".$new_followbutton_text."'
										WHEN key_locale='feed_item_unfollow_label' THEN '".$new_unfollowbutton_text."'
										WHEN key_locale='feeds_screen_heading' THEN '".$new_screenheading_text."'
										WHEN key_locale='common_search_bt' THEN '".$new_searchbar_text."'
										WHEN key_locale='Feeds_view_lable_No_of_Followers_txt' THEN '".$new_followers_text."'
										WHEN key_locale='Feeds_view_lable_No_of_View_txt' THEN '".$new_views_text."'
										END
									WHERE
										(key_locale='feeds_screen_all_feeds_tab') ||
										(key_locale='feeds_screen_followings_tag') || 
										(key_locale='feeds_screen_categories_tag') ||
										(key_locale='feeds_screen_hashtags_tag') ||
										(key_locale='feed_item_comments_label') ||
										(key_locale='feed_item_follow_label') ||
										(key_locale='feed_item_unfollow_label') ||
										(key_locale='feeds_screen_heading') ||
										(key_locale='common_search_bt') ||
										(key_locale='Feeds_view_lable_No_of_Followers_txt') ||
										(key_locale='Feeds_view_lable_No_of_View_txt')";

				$mysqli->query($translationquery);

			//Settings
				$settingsquery="UPDATE opp_settings
								SET value=CASE
									WHEN `key` = 'feeds_screen_all_feeds_tab_txt_c' THEN '".$new_allfeedsfilter_text_color."'
									WHEN `key` = 'feeds_screen_all_feeds_tab_bg_c' THEN '".$new_allfeedsfilter_bg_color."'
									WHEN `key` = 'feeds_screen_followings_tag_txt_c' THEN '".$new_followingfilter_text_color."'
									WHEN `key` = 'feeds_screen_followings_tag_bg_c' THEN '".$new_followingfilter_bg_color."'
									WHEN `key` = 'feeds_screen_categories_tag_txt_c' THEN '".$new_categoriesfilter_text_color."'
									WHEN `key` = 'feeds_screen_categories_tag_bg_c' THEN '".$new_categoriesfilter_bg_color."'
									WHEN `key` = 'feeds_screen_hashtags_tag_txt_c' THEN '".$new_hashtagsfilter_text_color."'
									WHEN `key` = 'feeds_screen_hashtags_tag_bg_c' THEN '".$new_hashtagsfilter_bg_color."'
									WHEN `key` = 'feeds_screen_comments_bg_c' THEN '".$new_commentsbutton_bg_color."'
									WHEN `key` = 'feeds_screen_comments_txt_c' THEN '".$new_commentsbutton_text_color."'
									WHEN `key` = 'feeds_screen_comments_count_bg_c' THEN '".$new_commentsbuttoncount_bg_color."'
									WHEN `key` = 'feeds_screen_comments_count_txt_c' THEN '".$new_commentsbuttoncount_text_color."'
									WHEN `key` = 'feeds_screen_follow_bg_c' THEN '".$new_followbutton_bg_color."'
									WHEN `key` = 'feeds_screen_follow_txt_c' THEN '".$new_followbutton_text_color."'
									WHEN `key` = 'video_feed_thumb' THEN '".$new_videofeed_thumbnail."'
									WHEN `key` = 'image_feed_thumb' THEN '".$new_imagefeed_thumbnail."'
									END
								WHERE
									(`key` = 'feeds_screen_all_feeds_tab_txt_c') ||
									(`key` = 'feeds_screen_all_feeds_tab_bg_c') ||
									(`key` = 'feeds_screen_followings_tag_txt_c') ||
									(`key` = 'feeds_screen_followings_tag_bg_c') ||
									(`key` = 'feeds_screen_categories_tag_txt_c') ||
									(`key` = 'feeds_screen_categories_tag_bg_c') ||
									(`key` = 'feeds_screen_hashtags_tag_txt_c') ||
									(`key` = 'feeds_screen_hashtags_tag_bg_c') ||
									(`key` = 'feeds_screen_comments_bg_c') ||
									(`key` = 'feeds_screen_comments_txt_c') ||
									(`key` = 'feeds_screen_comments_count_bg_c') ||
									(`key` = 'feeds_screen_comments_count_txt_c') ||
									(`key` = 'feeds_screen_follow_bg_c') ||
									(`key` = 'feeds_screen_follow_txt_c') ||
									(`key` = 'video_feed_thumb') ||
									(`key` = 'image_feed_thumb')";

				$mysqli->query($settingsquery);

			$message = '<div class="alert alert-success alert-dismissible fade in successmessage" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						  Your changes have been successfully saved.
						</div>';
		} else {
			if (empty($new_allfeedsfilter_text)) {$error = '<a id="AllFeedsTranslationhref" href="#AllFeedsTranslation" style="display:block;">All Feeds Filter Translation</a>'; }
			if (empty($new_followingfilter_text)) { if ($error == '') { $error = '<a id="FollowingTranslationhref" href="#FollowingTranslation" style="display:block;">Following Filter Translation</a>'; } else { $error .= '<a id="FollowingTranslationhref" href="#FollowingTranslation" style="display:block;">Following Filter Translation</a>'; } }
			if (empty($new_categoriesfilter_text)) { if ($error == '') { $error = '<a id="CategoriesTranslationhref" href="#CategoriesTranslation" style="display:block;">Categories Filter Translation</a>'; } else { $error .= '<a id="CategoriesTranslationhref" href="#CategoriesTranslation" style="display:block;">Categories Filter Translation</a>'; } }
			if (empty($new_hashtagsfilter_text)) { if ($error == '') { $error = '<a id="HashtagsTranslationhref" href="#HashtagsTranslation" style="display:block;">Hashtags Filter Translation</a>'; } else { $error .= '<a id="HashtagsTranslationhref" href="#HashtagsTranslation" style="display:block;">Hashtags Filter Translation</a>'; } }
			if (empty($new_commentsbutton_text)) { if ($error == '') { $error = '<a id="CommentsTranslationhref" href="#CommentsTranslation" style="display:block;">Comments Button Translation</a>'; } else { $error .= '<a id="CommentsTranslationhref" href="#CommentsTranslation" style="display:block;">Comments Button Translation</a>'; } }
			if (empty($new_followbutton_text)) { if ($error == '') { $error = '<a id="UnfollowTranslationhref" href="#UnfollowTranslation" style="display:block;">If Following Translation</a>'; } else { $error .= '<a id="UnfollowTranslationhref" href="#UnfollowTranslation" style="display:block;">If Following Translation</a>'; } }
			if (empty($new_unfollowbutton_text)) { if ($error == '') { $error = '<a id="FollowTranslationhref" href="#FollowTranslation" style="display:block;">If Not-Following Translation</a>'; } else { $error .= '<a id="FollowTranslationhref" href="#FollowTranslation" style="display:block;">If Not-Following Translation</a>'; } }
			if (empty($new_screenheading_text)) { if ($error == '') { $error = '<a id="ScreenHeadingTranslationhref" href="#ScreenHeadingTranslation" style="display:block;">Screen Heading Translation</a>'; } else { $error .= '<a id="ScreenHeadingTranslationhref" href="#ScreenHeadingTranslation" style="display:block;">Screen Heading Translation</a>'; } }
			if (empty($new_searchbar_text)) { if ($error == '') { $error = '<a id="SearchBarTranslationhref" href="#SearchBarTranslation" style="display:block;">Search Bar Translation</a>'; } else { $error .= '<a id="SearchBarTranslationhref" href="#SearchBarTranslation" style="display:block;">Search Bar Translation</a>'; } }
			if (empty($new_followers_text)) { if ($error == '') { $error = '<a id="FollowersTranslationhref" href="#FollowersTranslation" style="display:block;">Followers Translation</a>'; } else { $error .= '<a id="FollowersTranslationhref" href="#FollowersTranslation" style="display:block;">Followers Translation</a>'; } }
			if (empty($new_views_text)) { if ($error == '') { $error = '<a id="ViewsTranslationhref" href="#ViewsTranslation" style="display:block;">Views Translation</a>'; } else { $error .= '<a id="ViewsTranslationhref" href="#ViewsTranslation" style="display:block;">Views Translation</a>'; } }
			$message = '<div class="alert alert-danger alert-dismissible fade in errormessage" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						  <span id="errormessage">All fields must be inputted with content. Please fill out the following fields:</span>
						  '.$error.'
						</div>';
		}

	}

echo $message;

?>