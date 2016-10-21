<?php include('includes/database.php'); ?>
<?php

//Variables
	$allfeedsstatsoutput = '';
	$feedcelloutput = '';
	$feedfiltersoutput = '';
	$feedcount = 0;
	$actionshot = '';
	$videoactionshot = '';
	$imageactionshot = '';
	$commentsbuttonoutput = '';
	$icon = '';
	$limitallfeeds = 10;
	$whereclause = '';
	$whereclause1 = '';
	$dayssinceoutput = '';
	$trendstopusersoutput = '';
	$users = [];
	$categoriesresults = [];
	$membershipsresults = [];
	$hashtagsresults = [];
	$trendstopusersfeeds = [];
	$trendstopcategoriesfeeds = [];
	$trendstopmembershipsfeeds = [];
	$trendstophashtagsfeeds = [];
	$yourgroups = [];

//Load More Button
	if (!empty($_POST['loadmore'])) {
		$limitallfeeds=$_POST['loadmore'];
		if ($whereclause != '') {
			$limitallfeeds+=10;
		}
	}

//All Feeds Search
	//Search Bar
		if(!empty($_POST["allfeedssearchsearch"])) {
			$search = $_POST["allfeedssearchsearch"];
			$wordsAry = explode(", ", $search);
			$wordsCount = count($wordsAry);
			$whereclause = " AND ";
			for($i=0;$i<$wordsCount;$i++) {
				$whereclause .= "(u.f_name LIKE '%" . $wordsAry[$i] . "%'
									OR u.l_name LIKE '%" . $wordsAry[$i] . "%'
									OR c.category LIKE '%" . $wordsAry[$i] . "%'
									OR f.message LIKE '%" . $wordsAry[$i] . "%'
									OR m.membership_name LIKE '%" . $wordsAry[$i] . "%'
									OR CONCAT(u.f_name, ' ', u.l_name) LIKE '%" . $wordsAry[$i] . "%')";
				if($i!=$wordsCount-1) {
					$whereclause .= " AND ";
				}
			}
		}
	
	//Start Date
		if(!empty($_POST['allfeedssearchstartdate'])) {
			$startdate = $_POST['allfeedssearchstartdate'];
			$whereclause .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') >= '".$startdate."')";
		}

	//End Date	
		if(!empty($_POST['allfeedssearchenddate'])) {
			$enddate = $_POST['allfeedssearchenddate'];
			$whereclause .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') <= '".$enddate."')";
		}

	//Categories
		if(!empty($_POST['allfeedssearchcategories'])) {
			$categories = $_POST['allfeedssearchcategories'];
			$categoriesCount = count($categories);
			$whereclause .= " AND (";
			for($i=0;$i<$categoriesCount;$i++) {
				$whereclause .= "(c.id LIKE '%" . $categories[$i] . "%')";
				if($i!=$categoriesCount-1) {
					$whereclause .= " OR ";
				}
			}
			$whereclause .= ")";
		}
	
	//Memberships
		if(!empty($_POST['allfeedssearchmemberships'])) {
			$memberships = $_POST['allfeedssearchmemberships'];
			$membershipsCount = count($memberships);
			$whereclause .= " AND (";
			for($i=0;$i<$membershipsCount;$i++) {
				$whereclause .= "(m.id LIKE '%" . $memberships[$i] . "%')";
				if($i!=$membershipsCount-1) {
					$whereclause .= " OR ";
				}
			}
			$whereclause .= ")";
		}

//Days Since Search
	//Search Bar
		if(!empty($_POST["dayssincesearch"])) {
			$search = $_POST["dayssincesearch"];
			$wordsAry = explode(", ", $search);
			$wordsCount = count($wordsAry);
			$whereclause = " AND ";
			for($i=0;$i<$wordsCount;$i++) {
				$whereclause .= "(u.f_name LIKE '%" . $wordsAry[$i] . "%'
									OR u.l_name LIKE '%" . $wordsAry[$i] . "%'
									OR c.category LIKE '%" . $wordsAry[$i] . "%'
									OR f.message LIKE '%" . $wordsAry[$i] . "%'
									OR m.membership_name LIKE '%" . $wordsAry[$i] . "%'
									OR CONCAT(u.f_name, ' ', u.l_name) LIKE '%" . $wordsAry[$i] . "%')";
				if($i!=$wordsCount-1) {
					$whereclause .= " AND ";
				}
			}
		}
	
	//Start Date
		if(!empty($_POST['dayssincestartdate'])) {
			$startdate = $_POST['dayssincestartdate'];
			$whereclause .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') >= '".$startdate."')";
		}

	//End Date	
		if(!empty($_POST['dayssinceenddate'])) {
			$enddate = $_POST['dayssinceenddate'];
			$whereclause .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') <= '".$enddate."')";
		}

	//Categories
		if(!empty($_POST['dayssincecategories'])) {
			$categories = $_POST['dayssincecategories'];
			$categoriesCount = count($categories);
			$whereclause .= " AND (";
			for($i=0;$i<$categoriesCount;$i++) {
				$whereclause .= "(c.id LIKE '%" . $categories[$i] . "%')";
				if($i!=$categoriesCount-1) {
					$whereclause .= " OR ";
				}
			}
			$whereclause .= ")";
		}
	
	//Memberships
		if(!empty($_POST['dayssincememberships'])) {
			$memberships = $_POST['dayssincememberships'];
			$membershipsCount = count($memberships);
			$whereclause .= " AND (";
			for($i=0;$i<$membershipsCount;$i++) {
				$whereclause .= "(m.id LIKE '%" . $memberships[$i] . "%')";
				if($i!=$membershipsCount-1) {
					$whereclause .= " OR ";
				}
			}
			$whereclause .= ")";
		}

	//Your Groups
		if(!empty($_POST['dayssinceyourgroups'])) {
			$yourgroups = explode(',',$_POST['dayssinceyourgroups']);
			$yourgroupsCount = count($yourgroups);
			$whereclause .= " AND (";
			for($i=0;$i<$yourgroupsCount;$i++) {
				$whereclause .= "(u.id LIKE '%" . $yourgroups[$i] . "%')";
				if($i!=$yourgroupsCount-1) {
					$whereclause .= " OR ";
				}
			}
			$whereclause .= ")";
		}

//Trends Search
	//Search Bar
		if(!empty($_POST["trendssearch"])) {
			$search = $_POST["trendssearch"];
			$wordsAry = explode(", ", $search);
			$wordsCount = count($wordsAry);
			$whereclause1 = " AND ";
			for($i=0;$i<$wordsCount;$i++) {
				$whereclause1 .= "(u.f_name LIKE '%" . $wordsAry[$i] . "%'
									OR u.l_name LIKE '%" . $wordsAry[$i] . "%'
									OR c.category LIKE '%" . $wordsAry[$i] . "%'
									OR f.message LIKE '%" . $wordsAry[$i] . "%'
									OR m.membership_name LIKE '%" . $wordsAry[$i] . "%'
									OR CONCAT(u.f_name, ' ', u.l_name) LIKE '%" . $wordsAry[$i] . "%')";
				if($i!=$wordsCount-1) {
					$whereclause1 .= " AND ";
				}
			}
		}
	
	//Start Date
		if(!empty($_POST['trendsstartdate'])) {
			$startdate = $_POST['trendsstartdate'];
			$whereclause1 .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') >= '".$startdate."')";
		}

	//End Date	
		if(!empty($_POST['trendsenddate'])) {
			$enddate = $_POST['trendsenddate'];
			$whereclause1 .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') <= '".$enddate."')";
		}

	//Categories
		if(!empty($_POST['trendscategories'])) {
			$categories = $_POST['trendscategories'];
			$categoriesCount = count($categories);
			$whereclause1 .= " AND (";
			for($i=0;$i<$categoriesCount;$i++) {
				$whereclause1 .= "(c.id LIKE '%" . $categories[$i] . "%')";
				if($i!=$categoriesCount-1) {
					$whereclause1 .= " OR ";
				}
			}
			$whereclause1 .= ")";
		}
	
	//Memberships
		if(!empty($_POST['trendsmemberships'])) {
			$memberships = $_POST['trendsmemberships'];
			$membershipsCount = count($memberships);
			$whereclause1 .= " AND (";
			for($i=0;$i<$membershipsCount;$i++) {
				$whereclause1 .= "(m.id LIKE '%" . $memberships[$i] . "%')";
				if($i!=$membershipsCount-1) {
					$whereclause1 .= " OR ";
				}
			}
			$whereclause1 .= ")";
		}

	//Trends Shortcut Date
		if(!empty($_POST['trendsshortcutdate'])) {
			$trendsshortcutdate = $_POST['trendsshortcutdate'];
			if ($trendsshortcutdate == 'All') {
			} else {
				$whereclause1 .= " AND (from_unixtime(f.unix_timestamp, '%Y-%m-%d') >= '".$trendsshortcutdate."')";
			}
		}

//Trends
	//Top Users
		$trendstopusersquery="SELECT
								a.UserName UserName,
								COUNT(*) Feeds
							FROM (SELECT
									u.id UserID,
								    CONCAT(u.f_name,' ',u.l_name) UserName
								FROM ".DB_NAME.".opp_feeds f
								JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
								JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
								JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
								JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
								WHERE f.feed_type!='1' ".$whereclause1."
								GROUP BY f.id
								ORDER BY f.unix_timestamp DESC) a
                                GROUP BY a.UserID
                            ORDER BY Feeds desc, a.UserName
                            LIMIT 10";

        $trendstopusersresult = $mysqli->query($trendstopusersquery) or die($mysqli->error.__LINE__);

        if($trendstopusersresult->num_rows > 0) {
			while($trendstopusersrow = $trendstopusersresult->fetch_assoc()) {
				$users[] = $trendstopusersrow['UserName'];
				$trendstopusersfeeds[] = $trendstopusersrow['Feeds'];
			}
		}
	//Top Categories
		$trendstopcategoriesquery="SELECT
									a.CategoryName CategoryName,
									COUNT(*) Feeds
								FROM (SELECT
										c.category CategoryName,
	                                    c.id CategoryID
									FROM ".DB_NAME.".opp_feeds f
									JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
									JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
									JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
                                    JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
									WHERE f.feed_type!='1' ".$whereclause1."
									GROUP BY f.id
									ORDER BY f.unix_timestamp DESC) a
	                                GROUP BY a.CategoryID
	                            ORDER BY a.CategoryName
	                            LIMIT 10";

        $trendstopcategoriesresult = $mysqli->query($trendstopcategoriesquery) or die($mysqli->error.__LINE__);

        if($trendstopcategoriesresult->num_rows > 0) {
			while($trendstopcategoriesrow = $trendstopcategoriesresult->fetch_assoc()) {
				$categoriesresults[] = $trendstopcategoriesrow['CategoryName'];
				$trendstopcategoriesfeeds[] = $trendstopcategoriesrow['Feeds'];
			}
		}
	//Top Memberships
		$trendstopmembershipsquery="SELECT
									sum(a.feedcount) Feeds,
									m.membership_name MembershipName
								FROM (SELECT
								  		hf.historical_membershipsid AS membershipsid,
								  		COUNT(hf.id) AS feedcount
									FROM (
								  		SELECT
								    		f.id,
								    		f.user_id,
								    		( SELECT h.memberships_id
								      		  FROM ".MASTER_DB_NAME.".memberships_history h
								      		  WHERE h.users_id = f.user_id AND h.unix_timestamp < f.unix_timestamp
								      		  ORDER BY h.unix_timestamp DESC
								      		  LIMIT 1 ) AS historical_membershipsid
								  		FROM ".DB_NAME.".opp_feeds f
										JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
										JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
										JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
										JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
										WHERE f.feed_type!='1' ".$whereclause1."
										GROUP BY f.id) AS hf
								  		GROUP BY hf.id) a
								JOIN ".MASTER_DB_NAME.".memberships m ON a.membershipsid = m.id
								GROUP BY a.membershipsid";

        $trendstopmembershipsresult = $mysqli->query($trendstopmembershipsquery) or die($mysqli->error.__LINE__);

        if($trendstopmembershipsresult->num_rows > 0) {
			while($trendstopmembershipsrow = $trendstopmembershipsresult->fetch_assoc()) {
				$membershipsresults[] = $trendstopmembershipsrow['MembershipName'];
				$trendstopmembershipsfeeds[] = $trendstopmembershipsrow['Feeds'];
			}
		}
	//Top Hashtags
		$trendstophashtagsquery="SELECT
									a.Hashtag Hashtags,
								    COUNT(*) Feeds
								FROM (SELECT
								        h.hashtag Hashtag
								    FROM ".DB_NAME.".opp_hashtag_feeds h
								    JOIN ".DB_NAME.".opp_feeds f ON h.feed_id = f.id
									JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
									JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
								    JOIN ".MASTER_DB_NAME.".users u ON f.user_id = u.id
								    JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
								    WHERE f.feed_type!='1' ".$whereclause1.") a
								GROUP BY a.Hashtag
								ORDER BY Feeds desc
								LIMIT 10";

        $trendstophashtagsresult = $mysqli->query($trendstophashtagsquery) or die($mysqli->error.__LINE__);

        if($trendstophashtagsresult->num_rows > 0) {
			while($trendstophashtagsrow = $trendstophashtagsresult->fetch_assoc()) {
				$hashtagsresults[] = '#'.$trendstophashtagsrow['Hashtags'];
				$trendstophashtagsfeeds[] = $trendstophashtagsrow['Feeds'];
			}
		}

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
					JOIN ".DB_NAME."_master.memberships m ON u.membership_id = m.id
					WHERE f.feed_type!='1' ".$whereclause."
					GROUP BY f.id
					ORDER BY f.unix_timestamp DESC
					LIMIT ".$limitallfeeds.";";

	$allfeedsresult = $mysqli->query($allfeedsquery) or die($mysqli->error.__LINE__);

    if($allfeedsresult->num_rows > 0) {
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
	} else {
		$feedcelloutput = '<div class="feedcell col-lg-12">There are no matching results</div>';
	}

//Feed Count
	$feedcountquery = "SELECT
							sum(a.FeedID) Total
						FROM(SELECT
								COUNT(DISTINCT f.id) FeedID
							FROM ".DB_NAME.".opp_feeds f
							JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
							JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
							JOIN ".DB_NAME."_master.users u ON u.id = f.user_id
							JOIN ".DB_NAME."_master.memberships m ON u.membership_id = m.id
							WHERE f.feed_type!='1' ".$whereclause."
							GROUP BY f.id
							ORDER BY f.unix_timestamp DESC) a";

	$feedcountresult = $mysqli->query($feedcountquery) or die($mysqli->error.__LINE__);

    while($feedcountrow = $feedcountresult->fetch_assoc()) {
    	$TotalFeeds = $feedcountrow['Total'];
    	if ($limitallfeeds < $TotalFeeds) {
    		$feedcelloutput .= '<button id="loadmorebutton" rel="20" class="btn btn-block">Load More</button>';
    	}
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
							JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
							WHERE f.feed_type!='1' " . $whereclause . "
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

//Results
    $data = array(
		'feedcelloutput' => $feedcelloutput,
		'searchresults' => $TotalFeeds,
		'allfeedsstatsoutput' => $allfeedsstatsoutput,
		'users' => $users,
		'categoriesresults' => $categoriesresults,
		'membershipsresults' => $membershipsresults,
		'hashtagsresults' => $hashtagsresults,
		'trendstopmembershipsfeeds' => $trendstopmembershipsfeeds,
		'trendstopusersfeeds' => $trendstopusersfeeds,
		'trendstopcategoriesfeeds' => $trendstopcategoriesfeeds,
		'trendstophashtagsfeeds' => $trendstophashtagsfeeds,
		'whereclause1' => $whereclause1,
		'whereclause' => $whereclause,
		'dayssinceoutput' => $dayssinceoutput,
		'yourgroups' => $yourgroups
	);

	echo json_encode($data);

?>