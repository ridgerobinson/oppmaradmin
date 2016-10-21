<?php include('includes/header.php'); ?>
<script type="text/javascript" src="includes/index.js"></script>
<?php include('includes/index_queries.php'); ?>

<div id="message"></div>

<!-- Form -->
	<div class="form">
		<!-- Instructions -->
			<div id="instructionsheader" class="instructionsheader">Tips/Tricks</div>
			<div id="instructionscontent" class="instructionscontent">
				<div>These are the instructions</div>
			</div>
			<div id="instructionsadditional">Click here to expand</div>
		<!-- Filters -->
			<div id="filteroptionsheader" class="filteroptionsheader">Feed Filters</div>
			<div id="filteroptionscontent" class="filteroptionscontent">
				<!-- All Feeds Filter -->
					<div class="allfeedsfilteroptions form-group">
						<div class="title">All Feeds</div>
						<label>Translation</label>
						<input type="text" class="form-control" id="AllFeedsTranslation" placeholder="All Feeds Translation" value="<?php echo $AllFeedsTranslation; ?>">
						<label>Background Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="AllFeedsBGColorHex" value="#<?php echo $AllFeedsBGColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="AllFeedsBGColorSelector" placeholder="All Feeds BG Color" value="#<?php echo $AllFeedsBGColor; ?>">
						</div>
						<label>Text Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="AllFeedsTextColorHex" value="#<?php echo $AllFeedsTextColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="AllFeedsTextColorSelector" placeholder="All Feeds Text Color" value="#<?php echo $AllFeedsTextColor; ?>">
						</div>
						<button id="allfeedsfilterreset" class="btn btn-block">Reset</button>
					</div>
				<!-- Following Filter -->	
					<div class="followingfilteroptions form-group">
						<div class="title">Following</div>
						<label>Translation</label>
						<input type="text" class="form-control" id="FollowingTranslation" placeholder="Following Translation" value="<?php echo $FollowingTranslation; ?>">
						<label>Background Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="FollowingBGColorHex" value="#<?php echo $FollowingBGColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="FollowingBGColorSelector" placeholder="Following BG Color" value="#<?php echo $FollowingBGColor; ?>">
						</div>
						<label>Text Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="FollowingTextColorHex" value="#<?php echo $FollowingTextColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="FollowingTextColorSelector" placeholder="Following Text Color" value="#<?php echo $FollowingTextColor; ?>">
						</div>
						<button id="followingfilterreset" class="btn btn-block">Reset</button>
					</div>
				<!-- Categories Filter -->
					<div class="categoriesfilteroptions">
						<div class="title">Categories</div>
						<label>Translation</label>
						<input type="text" class="form-control" id="CategoriesTranslation" placeholder="Categories Translation" value="<?php echo $CategoriesTranslation; ?>">
						<label>Background Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="CategoriesBGColorHex" value="#<?php echo $CategoriesBGColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="CategoriesBGColorSelector" placeholder="Categories BG Color" value="#<?php echo $CategoriesBGColor; ?>">
						</div>
						<label>Text Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="CategoriesTextColorHex" value="#<?php echo $CategoriesTextColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="CategoriesTextColorSelector" placeholder="Categories Text Color" value="#<?php echo $CategoriesTextColor; ?>">
						</div>
						<button id="categoriesfilterreset" class="btn btn-block">Reset</button>
					</div>
				<!-- Hashtags Filter -->
					<div class="hashtagsfilteroptions">
						<div class="title">Hashtags</div>
						<label>Translation</label>
						<input type="text" class="form-control" id="HashtagsTranslation" placeholder="Hashtags Translation" value="<?php echo $HashtagsTranslation; ?>">
						<label>Background Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="HashtagsBGColorHex" value="#<?php echo $HashtagsBGColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="HashtagsBGColorSelector" placeholder="Hashtags BG Color" value="#<?php echo $HashtagsBGColor; ?>">
						</div>
						<label>Text Color</label>
						<div class="colorinput">
							<input class="form-control hex" type="text" id="HashtagsTextColorHex" value="#<?php echo $HashtagsTextColor; ?>" disabled>
							<input class="form-control colorpicker" type="color" id="HashtagsTextColorSelector" placeholder="Hashtags Text Color" value="#<?php echo $HashtagsTextColor; ?>">
						</div>
						<button id="hashtagsfilterreset" class="btn btn-block">Reset</button>
					</div>
			</div>
			<div id="filteroptionsadditional">Click here to expand</div>
		<!-- Social -->
			<div id="socialoptionsheader" class="socialoptionsheader">Social Buttons</div>
			<div id="socialoptionscontent" class="socialoptionscontent">
				<!-- Comments Button -->
					<div class="commentsbuttonoptions form-group">
						<div class="title">Comments Button</div>
						<label>Translation</label>
						<input type="text" class="form-control" id="CommentsTranslation" placeholder="Comments Translation" value="<?php echo $CommentButtonText; ?>">
						<label class="sectiontitle">Count Circle</label>
							<label>Background Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="CommentButtonCountBGColorHex" value="#<?php echo $CommentButtonCountBGColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="CommentButtonCountBGColorSelector" placeholder="Comments Button Count BG Color" value="#<?php echo $CommentButtonCountBGColor; ?>">
							</div>
							<label>Text Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="CommentButtonCountTextColorHex" value="#<?php echo $CommentButtonCountTextColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="CommentButtonCountTextColorSelector" placeholder="Comments Button Count Text Color" value="#<?php echo $CommentButtonCountTextColor; ?>">
							</div>
						<label class="sectiontitle">Button Text</label>
							<label>Background Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="CommentButtonBGColorHex" value="#<?php echo $CommentButtonBGColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="CommentButtonBGColorSelector" placeholder="Comment Button BG Color" value="#<?php echo $CommentButtonBGColor; ?>">
							</div>
							<label>Text Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="CommentButtonTextColorHex" value="#<?php echo $CommentButtonTextColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="CommentButtonTextColorSelector" placeholder="Comment Button Text Color" value="#<?php echo $CommentButtonTextColor; ?>">
							</div>
						<button id="commentsbuttonreset" class="btn btn-block">Reset</button>
					</div>
				<!-- Follow Button -->
					<div class="followbuttonoptions form-group">
						<div class="title">Follow Button</div>
						<label>If Following Translation</label>
						<input type="text" class="form-control" id="UnfollowTranslation" placeholder="Unfollow Translation" value="<?php echo $UnfollowButtonText; ?>">
						<label>If Not-Following Translation</label>
						<input type="text" class="form-control" id="FollowTranslation" placeholder="Follow Translation" value="<?php echo $FollowButtonText; ?>">
						<label class="sectiontitle">Button Text</label>
							<label>Background Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="FollowButtonBGColorHex" value="#<?php echo $FollowButtonBGColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="FollowButtonBGColorSelector" placeholder="Follow Button BG Color" value="#<?php echo $FollowButtonBGColor; ?>">
							</div>
							<label>Text Color</label>
							<div class="colorinput">
								<input class="form-control hex" type="text" id="FollowButtonTextColorHex" value="#<?php echo $FollowButtonTextColor; ?>" disabled>
								<input class="form-control colorpicker" type="color" id="FollowButtonTextColorSelector" placeholder="Follow Button Text Color" value="#<?php echo $FollowButtonTextColor; ?>">
							</div>
						<button id="followbuttonreset" class="btn btn-block">Reset</button>
					</div>
			</div>
			<div id="socialoptionsadditional">Click here to expand</div>
		<!-- Additional Settings -->
			<div id="additionaloptionsheader" class="additionaloptionsheader">Additional Settings</div>
			<div id="additionaloptionscontent" class="additionaloptionscontent">
				<!-- Feed Thumbnail -->
					<div class="feedthumbnailoptions form-group">
						<!-- Video Feed -->
							<div class="title video">Video Feed Thumbnail</div>
							<div class="thumbnails">
								<div id="videoprofile" class="image1 <?php if($VideoFeedThumb == 'profile_picture') { echo 'selected'; } ?>">
									<img id="video_profile" src="includes/images/default_profile.jpg">
									<div class="thumbnailtype">Profile</div>
								</div>
								<div id="videoaction" class="image2 <?php if($VideoFeedThumb == 'action_shot') { echo 'selected'; } ?>">
									<img id="video_action" src="includes/images/default_profile_action.jpg">
									<div class="thumbnailtype">Action</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						<!-- Image Feed -->
							<div class="title image">Image Feed Thumbnail</div>
							<div class="thumbnails">
								<div id="imageprofile" class="image1 <?php if($ImageFeedThumb == 'profile_picture') { echo 'selected'; } ?>">
									<img id="image_profile" src="includes/images/default_profile.jpg">
									<div class="thumbnailtype">Profile</div>
								</div>
								<div id="imageaction" class="image2 <?php if($ImageFeedThumb == 'action_shot') { echo 'selected'; } ?>">
									<img id="image_action" src="includes/images/default_profile_action.jpg">
									<div class="thumbnailtype">Action</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						<button id="thumbnailbuttonreset" class="btn btn-block">Reset</button>
					</div>
				<!-- Other Settings -->
					<div class="otheroptions form-group">
						<div class="title">Other Settings</div>
						<label>Screen Heading</label>
						<input type="text" class="form-control" id="ScreenHeadingTranslation" placeholder="Screen Heading Translation" value="<?php echo $FeedScreenHeading; ?>">
						<label>Search Bar</label>
						<input type="text" class="form-control" id="SearchBarTranslation" placeholder="Search Bar Translation" value="<?php echo $SearchBarTranslation; ?>">
						<label>Followers</label>
						<input type="text" class="form-control" id="FollowersTranslation" placeholder="Followers Translation" value="<?php echo $FollowersTranslation; ?>">
						<label>Views</label>
						<input type="text" class="form-control" id="ViewsTranslation" placeholder="Views Translation" value="<?php echo $ViewsTranslation; ?>">
						<button id="otheroptionsreset" class="btn btn-block">Reset</button>
					</div>
			</div>
			<div id="additionaloptionsadditional">Click here to expand</div>
		<button id="formsubmit" class="btn btn-block btn-success">Save</button>
		<div class="clearing"></div>
	</div>

<!-- All Feeds Card -->

	  <div class="card">
	    <div class="card-header">Live Demo</div>
	    <div class="toparea col-sm-12 col-lg-12">
	    	<div class="col-sm-3 col-lg-3"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></div>
	    	<div id="screenheading" class="col-sm-6 col-lg-6 title"><?php echo $FeedScreenHeading; ?></div>
	    	<div class="col-sm-3 col-lg-3"><i class="fa fa-refresh fa-lg pull-right" aria-hidden="true"></i></div>
	    </div>
	    <input type="text" id="searchbar" class="allfeedssearch col-sm-12 col-lg-12" placeholder="<?php echo $SearchBarTranslation; ?>">
		<div class="filterbuttons">
			<?php echo $feedfiltersoutput; ?>
		</div>
	    <div class="card-block">
	      <!-- All Feeds Area -->
			<div id="allfeeds">
			<!-- Text Feed Cell -->
			 	<div class="feedcell col-sm-12 col-lg-12 textfeed">
			 		<!-- Feed User Info -->
			 			<div class="profile col-sm-4 col-lg-4">
			 				<div class="feedthumbnail" style="max-width:100%;">
			 					<img class="backgroundmain" src="includes/images/default_profile<?php echo $actionshot; ?>.jpg">
			 					<img class="texticon" src="includes/images/feedicon_text.png">
			 				</div>
			 				<div class="username">User Name</div>
			 				<div class="followers"><span class="followerstext"><?php echo $FollowersCountText; ?></span>: #</div>
			 			</div>
			 		<!-- Feed Info -->
			 			<div class="feed col-sm-8 col-lg-8">
			 				<div class="category">Category Name</div>
			 				<div class="feedmessage">This is the feed message displaying user content</div>
			 				<div class="feeddate">mmm dd, yyyy</div>
			 				<div class="commentsbutton pull-left" style="background-color:#<?php echo $CommentButtonBGColor; ?>;">
			 					<?php echo $commentsbuttonoutput; ?>
			 				</div>					
			 				<div class="followbutton pull-right" style="background-color:#<?php echo $FollowButtonBGColor; ?>;">
			 					<?php echo $unfollowbuttonoutput; ?>
			 				</div>
			 			</div>
			 		<!-- Feed Footer -->
			 			<div class="feedfooter col-sm-12 col-lg-12">
			 				<div class="viewcount pull-left"><span class="viewstext"><?php echo $ViewsCountText; ?></span>: #</div>
			 				<div class="trashicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></span>
			 				</div>
							<div class="shareicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></span>
			 				</div>
			 			</div>
			 	</div>
			<!-- Video Feed Cell -->
			 	<div class="feedcell col-sm-12 col-lg-12 videofeed">
			 		<!-- Feed User Info -->
			 			<div class="profile col-sm-4 col-lg-4">
			 				<div class="feedthumbnail" style="max-width:100%;">
			 					<img class="backgroundmain" src="includes/images/default_profile<?php echo $videoactionshot; ?>.jpg">
			 					<img class="videoicon" src="includes/images/feedicon_video.png">
			 				</div>
			 				<div class="username">User Name</div>
			 				<div class="followers"><span class="followerstext"><?php echo $FollowersCountText; ?></span>: #</div>
			 			</div>
			 		<!-- Feed Info -->
			 			<div class="feed col-sm-8 col-lg-8">
			 				<div class="category">Category Name</div>
			 				<div class="feedmessage">This is the feed message displaying user content</div>
			 				<div class="feeddate">mmm dd, yyyy</div>
			 				<div class="commentsbutton pull-left" style="background-color:#<?php echo $CommentButtonBGColor; ?>;">
			 					<?php echo $commentsbuttonoutput; ?>
			 				</div>					
			 				<div class="followbutton pull-right" style="background-color:#<?php echo $FollowButtonBGColor; ?>;">
			 					<?php echo $followbuttonoutput; ?>
			 				</div>
			 			</div>
			 		<!-- Feed Footer -->
			 			<div class="feedfooter col-sm-12 col-lg-12">
			 				<div class="viewcount pull-left"><span class="viewstext"><?php echo $ViewsCountText; ?></span>: #</div>
			 				<div class="trashicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></span>
			 				</div>
							<div class="shareicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></span>
			 				</div>
			 			</div>
			 	</div>
			<!-- Image Feed Cell -->
			 	<div class="feedcell col-sm-12 col-lg-12 imagefeed">
			 		<!-- Feed User Info -->
			 			<div class="profile col-sm-4 col-lg-4">
			 				<div class="feedthumbnail" style="max-width:100%;">
			 					<img class="backgroundmain" src="includes/images/default_profile<?php echo $imageactionshot; ?>.jpg">
			 					<img class="imageicon" src="includes/images/feedicon_image.png">
			 				</div>
			 				<div class="username">User Name</div>
			 				<div class="followers"><span class="followerstext"><?php echo $FollowersCountText; ?></span>: #</div>
			 			</div>
			 		<!-- Feed Info -->
			 			<div class="feed col-sm-8 col-lg-8">
			 				<div class="category">Category Name</div>
			 				<div class="feedmessage">This is the feed message displaying user content</div>
			 				<div class="feeddate">mmm dd, yyyy</div>
			 				<div class="commentsbutton pull-left" style="background-color:#<?php echo $CommentButtonBGColor; ?>;">
			 					<?php echo $commentsbuttonoutput; ?>
			 				</div>					
			 				<div class="followbutton pull-right" style="background-color:#<?php echo $FollowButtonBGColor; ?>;">
			 					<?php echo $followbuttonoutput; ?>
			 				</div>
			 			</div>
			 		<!-- Feed Footer -->
			 			<div class="feedfooter col-sm-12 col-lg-12">
			 				<div class="viewcount pull-left"><span class="viewstext"><?php echo $ViewsCountText; ?></span>: #</div>
			 				<div class="trashicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></span>
			 				</div>
							<div class="shareicon pull-right col-sm-1 col-lg-1">
			 					<span class="pull-right"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i></span>
			 				</div>
			 			</div>
			 	</div>
			</div>
	    </div>
	  </div>

<?php include('includes/footer.php'); ?>