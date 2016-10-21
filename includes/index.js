$(document).ready(function() {

	//Color Picker
		$("input[type='color']").spectrum({preferredFormat: "hex", showInput: true, 
		    preferredFormat: "hex",
		    showInput: true
		});

	//Collapsing
		//Instructions
			$('#instructionsheader').on('click', function() {
				$('#instructionscontent').toggle();
				$('#instructionsadditional').toggle();
			});

			$('#instructionsadditional').on('click', function() {
				$('#instructionscontent').toggle();
				$('#instructionsadditional').toggle();
			});
		//Filters
			$('#filteroptionsheader').on('click', function() {
				$('#filteroptionscontent').toggle();
				$('#filteroptionsadditional').toggle();
			});

			$('#filteroptionsadditional').on('click', function() {
				$('#filteroptionscontent').toggle();
				$('#filteroptionsadditional').toggle();
			});
		//Social
			$('#socialoptionsheader').on('click', function() {
				$('#socialoptionscontent').toggle();
				$('#socialoptionsadditional').toggle();
			});

			$('#socialoptionsadditional').on('click', function() {
				$('#socialoptionscontent').toggle();
				$('#socialoptionsadditional').toggle();
			});
		//Additional
			$('#additionaloptionsheader').on('click', function() {
				$('#additionaloptionscontent').toggle();
				$('#additionaloptionsadditional').toggle();
			});

			$('#additionaloptionsadditional').on('click', function() {
				$('#additionaloptionscontent').toggle();
				$('#additionaloptionsadditional').toggle();
			});

	//All Feeds Filter
		//Original
			var original_allfeedsfilter_text = $('#allfeedsfilter').text();
			var original_allfeedsfilter_bg_color = $('#allfeedsfilter').attr("bg");
			var original_allfeedsfilter_text_color = $('#allfeedsfilter').attr('txt');

		//Translation
			$('#AllFeedsTranslation').on('keyup', function() {
				var text = $(this).val();
				$('#allfeedsfilter').text(text);
				if(text == '') {
					$('#allfeedsfilter').text(original_allfeedsfilter_text);
				}
			});

			// $("input[maxlength]").bind('input propertychange', function() {  
		 //        var maxLength = $(this).attr('maxlength');  
		 //        if ($(this).val().length > maxLength) {  
		 //            $(this).val($(this).val().substring(0, maxLength));  
		 //        }  
		 //    });

		//Background Color
			$('#AllFeedsBGColorSelector').on('change', function() {
				var color = $(this).val();
				$('#AllFeedsBGColorHex').val(color);
				$('#allfeedsfilter').css('background-color', color);
			});

			$('#AllFeedsBGColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#allfeedsfilter').css('background-color', color);
				$('#AllFeedsBGColorSelector').val('#'+color);
			});

		//Text Color
			$('#AllFeedsTextColorSelector').on('change', function() {
				var color = $(this).val();
				$('#AllFeedsTextColorHex').val(color);
				$('#allfeedsfilter').css('color', color);
			});

			$('#AllFeedsTextColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#allfeedsfilter').css('color', color);
				$('#AllFeedsTextColorSelector').val('#'+color);
			});

		//Reset Button
			$('#allfeedsfilterreset').on('click', function () {

				$('#allfeedsfilter').text(original_allfeedsfilter_text);
				$('#AllFeedsTranslation').val(original_allfeedsfilter_text);

				$('#allfeedsfilter').css('background-color', '#'+original_allfeedsfilter_bg_color);
				$('#AllFeedsBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_allfeedsfilter_bg_color});
				$('#AllFeedsBGColorHex').val('#'+original_allfeedsfilter_bg_color);

				$('#allfeedsfilter').css('color', '#'+original_allfeedsfilter_text_color);
				$('#AllFeedsTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_allfeedsfilter_text_color});
				$('#AllFeedsTextColorHex').val('#'+original_allfeedsfilter_text_color);
			});

		//Click Effect
			$('.allfeedsfilteroptions .title').on('click', function() {
				$('#allfeedsfilter').addClass('animate');
				setTimeout(function() {
					$('#allfeedsfilter').removeClass("animate");
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Background Color
				$('#AllFeedsBGColorHex').on('click', function() {
					$('#AllFeedsBGColorSelector').spectrum("toggle");
					return false;
				});
			//Text Color
				$('#AllFeedsTextColorHex').on('click', function() {
					$('#AllFeedsTextColorSelector').spectrum("toggle");
					return false;
				});

	//Following Filter
		//Original
			var original_followingfilter_text = $('#followingfilter').text();
			var original_followingfilter_bg_color = $('#followingfilter').attr("bg");
			var original_followingfilter_text_color = $('#followingfilter').attr('txt');

		//Translation
			$('#FollowingTranslation').on('keyup', function() {
				var text = $(this).val();
				$('#followingfilter').text(text);
				if(text == '') {
					$('#followingfilter').text(original_followingfilter_text);
				}
			});

		//Background Color
			$('#FollowingBGColorSelector').on('change', function() {
				var color = $(this).val();
				$('#FollowingBGColorHex').val(color);
				$('#followingfilter').css('background-color', color);
			});

			$('#FollowingBGColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#followingfilter').css('background-color', color);
				$('#FollowingBGColorSelector').val('#'+color);
			});

		//Text Color
			$('#FollowingTextColorSelector').on('change', function() {
				var color = $(this).val();
				$('#FollowingTextColorHex').val(color);
				$('#followingfilter').css('color', color);
			});

			$('#FollowingTextColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#followingfilter').css('color', color);
				$('#FollowingTextColorSelector').val('#'+color);
			});

		//Reset Button
			$('#followingfilterreset').on('click', function () {

				$('#followingfilter').text(original_followingfilter_text);
				$('#FollowingTranslation').val(original_followingfilter_text);

				$('#followingfilter').css('background-color', '#'+original_followingfilter_bg_color);
				$('#FollowingBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_followingfilter_bg_color});
				$('#FollowingBGColorHex').val('#'+original_followingfilter_bg_color);

				$('#followingfilter').css('color', '#'+original_followingfilter_text_color);
				$('#FollowingTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_followingfilter_text_color});
				$('#FollowingTextColorHex').val('#'+original_followingfilter_text_color);
			});

		//Click Effect
			$('.followingfilteroptions .title').on('click', function() {
				$('#followingfilter').addClass('animate');
				setTimeout(function() {
					$('#followingfilter').removeClass("animate");
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Background Color
				$('#FollowingBGColorHex').on('click', function() {
					$('#FollowingBGColorSelector').spectrum("toggle");
					return false;
				});
			//Text Color
				$('#FollowingTextColorHex').on('click', function() {
					$('#FollowingTextColorSelector').spectrum("toggle");
					return false;
				});

	//Categories Filter
		//Original
			var original_categoriesfilter_text = $('#categoriesfilter').text();
			var original_categoriesfilter_bg_color = $('#categoriesfilter').attr("bg");
			var original_categoriesfilter_text_color = $('#categoriesfilter').attr('txt');

		//Translation	
			$('#CategoriesTranslation').on('keyup', function() {
				var text = $(this).val();
				$('#categoriesfilter').text(text);
				if(text == '') {
					$('#categoriesfilter').text(original_categoriesfilter_text);
				}
			});

		//Background Color
			$('#CategoriesBGColorSelector').on('change', function() {
				var color = $(this).val();
				$('#CategoriesBGColorHex').val(color);
				$('#categoriesfilter').css('background-color', color);
			});

			$('#CategoriesBGColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#categoriesfilter').css('background-color', color);
				$('#CategoriesBGColorSelector').val('#'+color);
			});

		//Text Color
			$('#CategoriesTextColorSelector').on('change', function() {
				var color = $(this).val();
				$('#CategoriesTextColorHex').val(color);
				$('#categoriesfilter').css('color', color);
			});

			$('#CategoriesTextColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#categoriesfilter').css('color', color);
				$('#CategoriesTextColorSelector').val('#'+color);
			});

		//Reset Button
			$('#categoriesfilterreset').on('click', function () {

				$('#categoriesfilter').text(original_categoriesfilter_text);
				$('#CategoriesTranslation').val(original_categoriesfilter_text);

				$('#categoriesfilter').css('background-color', '#'+original_categoriesfilter_bg_color);
				$('#CategoriesBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_categoriesfilter_bg_color});
				$('#CategoriesBGColorHex').val('#'+original_categoriesfilter_bg_color);

				$('#categoriesfilter').css('color', '#'+original_categoriesfilter_text_color);
				$('#CategoriesTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_categoriesfilter_text_color});
				$('#CategoriesTextColorHex').val('#'+original_categoriesfilter_text_color);
			});

		//Click Effect
			$('.categoriesfilteroptions .title').on('click', function() {
				$('#categoriesfilter').addClass('animate');
				setTimeout(function() {
					$('#categoriesfilter').removeClass("animate");
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Background Color
				$('#CategoriesBGColorHex').on('click', function() {
					$('#CategoriesBGColorSelector').spectrum("toggle");
					return false;
				});
			//Text Color
				$('#CategoriesTextColorHex').on('click', function() {
					$('#CategoriesTextColorSelector').spectrum("toggle");
					return false;
				});

	//Hashtags Filter
		//Original
			var original_hashtagsfilter_text = $('#hashtagsfilter').text();
			var original_hashtagsfilter_bg_color = $('#hashtagsfilter').attr("bg");
			var original_hashtagsfilter_text_color = $('#hashtagsfilter').attr('txt');

		//Translation
			$('#HashtagsTranslation').on('keyup', function() {
				var text = $(this).val();
				$('#hashtagsfilter').text(text);
				if(text == '') {
					$('#hashtagsfilter').text(original_hashtagsfilter_text);
				}
			});

		//Background Color
			$('#HashtagsBGColorSelector').on('change', function() {
				var color = $(this).val();
				$('#HashtagsBGColorHex').val(color);
				$('#hashtagsfilter').css('background-color', color);
			});

			$('#HashtagsBGColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#hashtagsfilter').css('background-color', color);
				$('#HashtagsBGColorSelector').val('#'+color);
			});

		//Text Color
			$('#HashtagsTextColorSelector').on('change', function() {
				var color = $(this).val();
				$('#HashtagsTextColorHex').val(color);
				$('#hashtagsfilter').css('color', color);
			});

			$('#HashtagsTextColorHex').on('keyup', function() {
				var color = $(this).val();
				$('#hashtagsfilter').css('color', color);
				$('#HashtagsTextColorSelector').val('#'+color);
			});

		//Reset Button
			$('#hashtagsfilterreset').on('click', function () {

				$('#hashtagsfilter').text(original_hashtagsfilter_text);
				$('#HashtagsTranslation').val(original_hashtagsfilter_text);

				$('#hashtagsfilter').css('background-color', '#'+original_hashtagsfilter_bg_color);
				$('#HashtagsBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_hashtagsfilter_bg_color});
				$('#HashtagsBGColorHex').val('#'+original_hashtagsfilter_bg_color);

				$('#hashtagsfilter').css('color', '#'+original_hashtagsfilter_text_color);
				$('#HashtagsTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_hashtagsfilter_text_color});
				$('#HashtagsTextColorHex').val('#'+original_hashtagsfilter_text_color);
			});

		//Click Effect
			$('.hashtagsfilteroptions .title').on('click', function() {
				$('#hashtagsfilter').addClass('animate');
				setTimeout(function() {
					$('#hashtagsfilter').removeClass("animate");
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Background Color
				$('#HashtagsBGColorHex').on('click', function() {
					$('#HashtagsBGColorSelector').spectrum("toggle");
					return false;
				});
			//Text Color
				$('#HashtagsTextColorHex').on('click', function() {
					$('#HashtagsTextColorSelector').spectrum("toggle");
					return false;
				});

	//Comments Button
		//Original
			var original_commentsbutton_text = $('.textfeed .commentsbuttontext').text();
			var original_commentsbutton_bg_color = $('.textfeed .commentsbuttontext').attr("bg");
			var original_commentsbutton_text_color = $('.textfeed .commentsbuttontext').attr('txt');
			var original_commentsbuttoncount_bg_color = $('.textfeed .commentscount').attr("bg");
			var original_commentsbuttoncount_text_color = $('.textfeed .commentscount').attr('txt');

		//Translation
			$('#CommentsTranslation').on('keyup', function() {
				var text = $(this).val();
				$('.commentsbuttontext').text(text);
				if(text == '') {
					$('.commentsbuttontext').text(original_commentsbutton_text);
				}
			});

		//Background Color
			//Comment Count
				$('#CommentButtonCountBGColorSelector').on('change', function() {
					var color = $(this).val();
					$('#CommentButtonCountBGColorHex').val(color);
					$('.commentscount').css('background-color', color);
				});
			//Comment Text
				$('#CommentButtonBGColorSelector').on('change', function() {
					var color = $(this).val();
					$('#CommentButtonBGColorHex').val(color);
					$('.commentsbutton').css('background-color', color);
					$('.commentsbuttontext').css('background-color', color);
				});

		//Text Color
			//Comment Count
				$('#CommentButtonCountTextColorSelector').on('change', function() {
					var color = $(this).val();
					$('#CommentButtonCountTextColorHex').val(color);
					$('.commentscount').css('color', color);
				});
			//Comment Text
				$('#CommentButtonTextColorSelector').on('change', function() {
					var color = $(this).val();
					$('#CommentButtonTextColorHex').val(color);
					$('.commentsbuttontext').css('color', color);
				});

		//Reset Button
			$('#commentsbuttonreset').on('click', function () {

				$('.commentsbuttontext').text(original_commentsbutton_text);
				$('#CommentsTranslation').val(original_commentsbutton_text);

			//Comment Text Button
				//BG Color
					$('.commentsbutton').css('background-color', '#'+original_commentsbutton_bg_color);
					$('.commentsbuttontext').css('background-color', '#'+original_commentsbutton_bg_color);
					$('#CommentButtonBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_commentsbutton_bg_color});
					$('#CommentButtonBGColorHex').val('#'+original_commentsbutton_bg_color);
				//Text Color
					$('.commentsbuttontext').css('color', '#'+original_commentsbutton_text_color);
					$('#CommentButtonTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_commentsbutton_text_color});
					$('#CommentButtonTextColorHex').val('#'+original_commentsbutton_text_color);

			//Comment Count Button
				//BG Color
					$('.commentscount').css('background-color', '#'+original_commentsbuttoncount_bg_color);
					$('#CommentButtonCountBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_commentsbuttoncount_bg_color});
					$('#CommentButtonCountBGColorHex').val('#'+original_commentsbuttoncount_bg_color);
				//Text Color
					$('.commentscount').css('color', '#'+original_commentsbuttoncount_text_color);
					$('#CommentButtonCountTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_commentsbuttoncount_text_color});
					$('#CommentButtonCountTextColorHex').val('#'+original_commentsbuttoncount_text_color);
			});

		//Click Effect
			$('.commentsbuttonoptions .title').on('click', function() {
				$('div.commentsbutton').addClass('animate');
				$('span.commentscount').addClass('animate');
				$('span.commentsbuttontext').addClass('animate');
				setTimeout(function() {
					$('div.commentsbutton').removeClass("animate");
					$('span.commentscount').removeClass('animate');
					$('span.commentsbuttontext').removeClass('animate');
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Comment Text Background Color
				$('#CommentButtonBGColorHex').on('click', function() {
					$('#CommentButtonBGColorSelector').spectrum("toggle");
					return false;
				});
			//Comment Text Text Color
				$('#CommentButtonTextColorHex').on('click', function() {
					$('#CommentButtonTextColorSelector').spectrum("toggle");
					return false;
				});
			//Comment Count Background Color
				$('#CommentButtonCountBGColorHex').on('click', function() {
					$('#CommentButtonCountBGColorSelector').spectrum("toggle");
					return false;
				});
			//Comment Count Text Color
				$('#CommentButtonCountTextColorHex').on('click', function() {
					$('#CommentButtonCountTextColorSelector').spectrum("toggle");
					return false;
				});

	//Follow Button
		//Original
			var original_followbutton_text = $('.imagefeed .followbuttontext').text();
			var original_unfollowbutton_text = $('.textfeed .followbuttontext').text();
			var original_followbutton_bg_color = $('.imagefeed .followbuttontext').attr('bg');
			var original_followbutton_text_color = $('.imagefeed .followbuttontext').attr('txt');

		//Translation
			$('#FollowTranslation').on('keyup', function() {
				var text = $(this).val();
				$('.imagefeed .followbuttontext').text(text);
				$('.videofeed .followbuttontext').text(text);
				if(text == '') {
					$('.imagefeed .followbuttontext').text(original_followbutton_text);
					$('.videofeed .followbuttontext').text(original_followbutton_text);
				}
			});

			$('#UnfollowTranslation').on('keyup', function() {
				var text = $(this).val();
				$('.textfeed .followbuttontext').text(text);
				if(text == '') {
					$('.textfeed .followbuttontext').text(original_unfollowbutton_text);
				}
			});

		//Background Color
			$('#FollowButtonBGColorSelector').on('change', function() {
				var color = $(this).val();
				$('#FollowButtonBGColorHex').val(color);
				$('.followbuttontext').css('background-color', color);				
				$('.followbutton').css('background-color', color);
			});

			$('#FollowButtonBGColorHex').on('keyup', function() {
				var color = $(this).val();
				$('.followbuttontext').css('background-color', color);
				$('.followbutton').css('background-color', color);
				$('#FollowButtonBGColorSelector').val('#'+color);
			});

		//Text Color
			$('#FollowButtonTextColorSelector').on('change', function() {
				var color = $(this).val();
				$('#FollowButtonTextColorHex').val(color);
				$('.followbuttontext').css('color', color);
			});

			$('#FollowButtonTextColorHex').on('keyup', function() {
				var color = $(this).val();
				$('.followbuttontext').css('color', color);
				$('#FollowButtonTextColorSelector').val('#'+color);
			});

		//Reset Button
			$('#followbuttonreset').on('click', function () {
				//Translations
					$('#FollowTranslation').val(original_followbutton_text);
					$('#UnfollowTranslation').val(original_unfollowbutton_text);
					$('.imagefeed .followbuttontext').text(original_followbutton_text);
					$('.videofeed .followbuttontext').text(original_followbutton_text);
					$('.textfeed .followbuttontext').text(original_unfollowbutton_text);
				//Background Color
					$('.followbuttontext').css('background-color', '#'+original_followbutton_bg_color);
					$('.followbutton').css('background-color', '#'+original_followbutton_bg_color);
					$('#FollowButtonBGColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_followbutton_bg_color});
					$('#FollowButtonBGColorHex').val('#'+original_followbutton_bg_color);
				//Text Color
					$('.followbuttontext').css('color', '#'+original_followbutton_text_color);
					$('#FollowButtonTextColorSelector').spectrum({preferredFormat: "hex", showInput: true, color:'#'+original_followbutton_text_color});
					$('#FollowButtonTextColorHex').val('#'+original_followbutton_text_color);
			});

		//Click Effect
			$('.followbuttonoptions .title').on('click', function() {
				$('div.followbutton').addClass('animate');
				$('span.followcount').addClass('animate');
				$('span.followbuttontext').addClass('animate');
				setTimeout(function() {
					$('div.followbutton').removeClass("animate");
					$('span.followcount').removeClass('animate');
					$('span.followbuttontext').removeClass('animate');
				}, 1000);
			});

		//Opening Spectrum on Hex
			//Background Color
				$('#FollowButtonBGColorHex').on('click', function() {
					$('#FollowButtonBGColorSelector').spectrum("toggle");
					return false;
				});
			//Text Color
				$('#FollowButtonTextColorHex').on('click', function() {
					$('#FollowButtonTextColorSelector').spectrum("toggle");
					return false;
				});

	//Feed Thumbnails
		//Original
			//Video Feeds
				if ($('#videoprofile').hasClass('selected')) {
					var original_videofeed_thumbnail = 'profile';
				} else {
					var original_videofeed_thumbnail = 'action';
				}
			//Image Feeds
				if ($('#imageprofile').hasClass('selected')) {
					var original_imagefeed_thumbnail = 'profile';
				} else {
					var original_imagefeed_thumbnail = 'action';
				}

		//Adding Selected Class
			//Video Feeds
				$('#videoprofile').on('click', function() {
					if ($(this).hasClass('selected')) {
					} else {
						$('#videoaction').removeClass('selected');
						$(this).addClass('selected');
					}

					$('.videofeed .backgroundmain').attr('src', 'includes/images/default_profile.jpg');
				});

				$('#videoaction').on('click', function() {
					if ($(this).hasClass('selected')) {
					} else {
						$('#videoprofile').removeClass('selected');
						$(this).addClass('selected');
					}

					$('.videofeed .backgroundmain').attr('src', 'includes/images/default_profile_action.jpg');
				});
			//Image Feeds
				$('#imageprofile').on('click', function() {
					if ($(this).hasClass('selected')) {
					} else {
						$('#imageaction').removeClass('selected');
						$(this).addClass('selected');
					}

					$('.imagefeed .backgroundmain').attr('src', 'includes/images/default_profile.jpg');
				});

				$('#imageaction').on('click', function() {
					if ($(this).hasClass('selected')) {
					} else {
						$('#imageprofile').removeClass('selected');
						$(this).addClass('selected');
					}

					$('.imagefeed .backgroundmain').attr('src', 'includes/images/default_profile_action.jpg');
				});

		//Reset Button
			$('#thumbnailbuttonreset').on('click', function() {
				//Video Feeds
					if (original_videofeed_thumbnail == 'profile') {
						$('.videofeed .backgroundmain').attr('src', 'includes/images/default_profile.jpg');
						if ($('#videoprofile').hasClass('selected')) {
						} else {
							$('#videoaction').removeClass('selected');
							$('#videoprofile').addClass('selected');
						}
					} else {
						$('.videofeed .backgroundmain').attr('src', 'includes/images/default_profile_action.jpg');
						if ($('#videoaction').hasClass('selected')) {
						} else {
							$('#videoprofile').removeClass('selected');
							$('#videoaction').addClass('selected');
						}
					}
				//Image Feeds
					if (original_imagefeed_thumbnail == 'profile') {
						$('.imagefeed .backgroundmain').attr('src', 'includes/images/default_profile.jpg');
						if ($('#imageprofile').hasClass('selected')) {
						} else {
							$('#imageaction').removeClass('selected');
							$('#imageprofile').addClass('selected');
						}
					} else {
						$('.imagefeed .backgroundmain').attr('src', 'includes/images/default_profile_action.jpg');
						if ($('#imageaction').hasClass('selected')) {
						} else {
							$('#imageprofile').removeClass('selected');
							$('#imageaction').addClass('selected');
						}
					}
			});

		//Click Effect
			//Video Feeds
				$('.feedthumbnailoptions .video.title').on('click', function() {
					$('.videofeed .backgroundmain').addClass('animate');
					$('.videofeed .videoicon').addClass('animate');
					setTimeout(function() {
						$('.videofeed .backgroundmain').removeClass("animate");
						$('.videofeed .videoicon').removeClass('animate');
					}, 1000);
				});
			//Image Feeds
				$('.feedthumbnailoptions .image.title').on('click', function() {
					$('.imagefeed .backgroundmain').addClass('animate');
					$('.imagefeed .imageicon').addClass('animate');
					setTimeout(function() {
						$('.imagefeed .backgroundmain').removeClass("animate");
						$('.imagefeed .imageicon').removeClass('animate');
					}, 1000);
				});

	//Other Settings
		//Original
			var original_screenheading_text = $('#ScreenHeadingTranslation').val();
			var original_searchbar_text = $('#searchbar').attr('placeholder');
			var original_followers_text = $('.videofeed span.followerstext').text();
			var original_views_text = $('.videofeed span.viewstext').text();;
		//Translations
			//Screen Heading
				$('#ScreenHeadingTranslation').on('keyup', function() {
					var text = $(this).val();
					$('#screenheading').text(text);
					if(text == '') {
						$('#screenheading').text(original_screenheading_text);
					}
				});
			//Search Bar
				$('#SearchBarTranslation').on('keyup', function() {
					var text = $(this).val();
					$('#searchbar').attr('placeholder',text);
					if(text == '') {
						$('#searchbar').attr('placeholder',original_searchbar_text);
					}
				});
			//Followers
				$('#FollowersTranslation').on('keyup', function() {
					var text = $(this).val();
					$('span.followerstext').text(text);
					if(text == '') {
						$('span.followerstext').text(original_followers_text);
					}
				});
			//Views
				$('#ViewsTranslation').on('keyup', function() {
					var text = $(this).val();
					$('span.viewstext').text(text);
					if(text == '') {
						$('span.viewstext').text(original_views_text);
					}
				});

		//Reset Button
			$('#otheroptionsreset').on('click', function () {
				//Screen Heading
					$('#screenheading').text(original_screenheading_text);
					$('#ScreenHeadingTranslation').val(original_screenheading_text);
				//Search Bar
					$('#searchbar').attr('placeholder',original_searchbar_text);
					$('#SearchBarTranslation').val(original_searchbar_text);
				//Followers
					$('span.followerstext').text(original_followers_text);
					$('#FollowersTranslation').val(original_followers_text);
				//Views
					$('span.viewstext').text(original_views_text);
					$('#ViewsTranslation').val(original_views_text);
			});
		
	//Form Submit
		$('#formsubmit').on('click', function() {
			//Variables
				var formsubmit = 'Form Submitted';
				//Filters
					//All Feeds Filter Variables
						var new_allfeedsfilter_text = $('#AllFeedsTranslation').val();
						var new_allfeedsfilter_bg_color = ($('#AllFeedsBGColorSelector').val()).replace('#','');
						var new_allfeedsfilter_text_color = ($('#AllFeedsTextColorSelector').val()).replace('#','');
					//Following Filter Variables
						var new_followingfilter_text = $('#FollowingTranslation').val();
						var new_followingfilter_bg_color = ($('#FollowingBGColorSelector').val()).replace('#','');
						var new_followingfilter_text_color = ($('#FollowingTextColorSelector').val()).replace('#','');
					//Categories Filter Variables
						var new_categoriesfilter_text = $('#CategoriesTranslation').val();
						var new_categoriesfilter_bg_color = ($('#CategoriesBGColorSelector').val()).replace('#','');
						var new_categoriesfilter_text_color = ($('#CategoriesTextColorSelector').val()).replace('#','');
					//Hashtags Filter Variables
						var new_hashtagsfilter_text = $('#HashtagsTranslation').val();
						var new_hashtagsfilter_bg_color = ($('#HashtagsBGColorSelector').val()).replace('#','');
						var new_hashtagsfilter_text_color = ($('#HashtagsTextColorSelector').val()).replace('#','');
				//Social
					//Comments
						var new_commentsbutton_text = $('#CommentsTranslation').val();
						var new_commentsbutton_bg_color = ($('#CommentButtonBGColorSelector').val()).replace('#','');
						var new_commentsbutton_text_color = ($('#CommentButtonTextColorSelector').val()).replace('#','');
						var new_commentsbuttoncount_bg_color = ($('#CommentButtonCountBGColorSelector').val()).replace('#','');
						var new_commentsbuttoncount_text_color = ($('#CommentButtonCountTextColorSelector').val()).replace('#','');
					//Following
						var new_followbutton_text = $('#FollowTranslation').val();
						var new_unfollowbutton_text = $('#UnfollowTranslation').val();
						var new_followbutton_bg_color = ($('#FollowButtonBGColorSelector').val()).replace('#','');
						var new_followbutton_text_color = ($('#FollowButtonTextColorSelector').val()).replace('#','');
				//Additional Settings
					//Feed Thumnails
						//Video Feed
							if ($('#videoprofile').hasClass('selected')) {
								var new_videofeed_thumbnail = 'profile_picture';
							} else {
								var new_videofeed_thumbnail = 'action_shot';
							}
						//Image Feed
							if ($('#imageprofile').hasClass('selected')) {
								var new_imagefeed_thumbnail = 'profile_picture';
							} else {
								var new_imagefeed_thumbnail = 'action_shot';
							}
					//Other Settings
						var new_screenheading_text = $('#ScreenHeadingTranslation').val();
						var new_searchbar_text = $('#SearchBarTranslation').val();
						var new_followers_text = $('#FollowersTranslation').val();
						var new_views_text = $('#ViewsTranslation').val();

			$("body #message").fadeTo(0, 500);

			$.ajax({
				url: 'index_ajax.php',
				data: {
					formsubmit:formsubmit,
					new_allfeedsfilter_text:new_allfeedsfilter_text,
					new_allfeedsfilter_bg_color:new_allfeedsfilter_bg_color,
					new_allfeedsfilter_text_color:new_allfeedsfilter_text_color,
					new_followingfilter_text:new_followingfilter_text,
					new_followingfilter_bg_color:new_followingfilter_bg_color,
					new_followingfilter_text_color:new_followingfilter_text_color,
					new_categoriesfilter_text:new_categoriesfilter_text,
					new_categoriesfilter_bg_color:new_categoriesfilter_bg_color,
					new_categoriesfilter_text_color:new_categoriesfilter_text_color,
					new_hashtagsfilter_text:new_hashtagsfilter_text,
					new_hashtagsfilter_bg_color:new_hashtagsfilter_bg_color,
					new_hashtagsfilter_text_color:new_hashtagsfilter_text_color,
					new_commentsbutton_text:new_commentsbutton_text,
					new_commentsbutton_bg_color:new_commentsbutton_bg_color,
					new_commentsbutton_text_color:new_commentsbutton_text_color,
					new_commentsbuttoncount_bg_color:new_commentsbuttoncount_bg_color,
					new_commentsbuttoncount_text_color:new_commentsbuttoncount_text_color,
					new_followbutton_text:new_followbutton_text,
					new_unfollowbutton_text:new_unfollowbutton_text,
					new_followbutton_bg_color:new_followbutton_bg_color,
					new_followbutton_text_color:new_followbutton_text_color,
					new_videofeed_thumbnail:new_videofeed_thumbnail,
					new_imagefeed_thumbnail:new_imagefeed_thumbnail,
					new_screenheading_text:new_screenheading_text,
					new_searchbar_text:new_searchbar_text,
					new_followers_text:new_followers_text,
					new_views_text:new_views_text
					},
				type: 'POST',
				success: function(data) {
					if (!data.error) {
						$('#message').html(data);
						$('html, body').animate({ scrollTop: 0 }, 'fast');
						window.setTimeout(function() {
						  $("body #message .successmessage").fadeTo(500, 0).slideUp(500);
						}, 2000);
					}
				}
			});
		});

	//Form Errors if Fixed
		//Error Count
			function errorfixing () {
				var errors = ($("#message a").length);
				var fixed_errors = ($("#message a.fixed").length);
				if (errors == fixed_errors) {
					if ($('div.errormessage').is(':visible')) {
						$('#message div.alert').removeClass('errormessage');
						$('#message div.alert').removeClass('alert-danger');
						$('#message div.alert').addClass('successmessage');
						$('#message div.alert').addClass('alert-success');
						$('#message #errormessage').html("All missing fields have been added. You can now save!");

						window.setTimeout(function() {
						  $("body #message .successmessage").fadeTo(500, 0).slideUp(500);
						}, 2000);
					}
				}
			}
		//All Feeds Filter
			//Typing
				$('#AllFeedsTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #AllFeedsTranslationhref').hide();
						$('body #AllFeedsTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #AllFeedsTranslationhref').show();
						$('body #AllFeedsTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#allfeedsfilterreset').on('click', function () {
					$('body #AllFeedsTranslationhref').hide();
					$('body #AllFeedsTranslationhref').addClass('fixed');
					errorfixing();
				});
			//Parent Div Closed
				$('#message').on('click', '#AllFeedsTranslationhref', function() {
					if ($('#filteroptionscontent').is(':hidden')) {
						$('#filteroptionscontent').toggle();
						$('#filteroptionsadditional').toggle();
					}
				});
		//Following Filter
			//Typing
				$('#FollowingTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #FollowingTranslationhref').hide();
						$('body #FollowingTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #FollowingTranslationhref').show();
						$('body #FollowingTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#followingfilterreset').on('click', function () {
					$('body #FollowingTranslationhref').hide();
					$('body #FollowingTranslationhref').addClass('fixed');
					errorfixing();
				});
			//Parent Div Closed
				$('#message').on('click', '#FollowingTranslationhref', function() {
					if ($('#filteroptionscontent').is(':hidden')) {
						$('#filteroptionscontent').toggle();
						$('#filteroptionsadditional').toggle();
					}
				});
		//Categories Filter
			//Typing
				$('#CategoriesTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #CategoriesTranslationhref').hide();
						$('body #CategoriesTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #CategoriesTranslationhref').show();
						$('body #CategoriesTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#categoriesfilterreset').on('click', function () {
					$('body #CategoriesTranslationhref').hide();
					$('body #CategoriesTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#CategoriesTranslationhref', function() {
					if ($('#filteroptionscontent').is(':hidden')) {
						$('#filteroptionscontent').toggle();
						$('#filteroptionsadditional').toggle();
					}
				});
		//Hashtags Filter
			//Typing
				$('#HashtagsTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #HashtagsTranslationhref').hide();
						$('body #HashtagsTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #HashtagsTranslationhref').show();
						$('body #HashtagsTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#hashtagsfilterreset').on('click', function () {
					$('body #HashtagsTranslationhref').hide();
					$('body #HashtagsTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#HashtagsTranslationhref', function() {
					if ($('#filteroptionscontent').is(':hidden')) {
						$('#filteroptionscontent').toggle();
						$('#filteroptionsadditional').toggle();
					}
				});
		//Comments Button
			//Typing
				$('#CommentsTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #CommentsTranslationhref').hide();
						$('body #CommentsTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #CommentsTranslationhref').show();
						$('body #CommentsTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#commentsbuttonreset').on('click', function () {
					$('body #CommentsTranslationhref').hide();
					$('body #CommentsTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#CommentsTranslationhref', function() {
					if ($('#socialoptionscontent').is(':hidden')) {
						$('#socialoptionscontent').toggle();
						$('#socialoptionsadditional').toggle();
					}
				});
		//Unfollow Text
			//Typing
				$('#UnfollowTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #UnfollowTranslationhref').hide();
						$('body #UnfollowTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #UnfollowTranslationhref').show();
						$('body #UnfollowTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#followbuttonreset').on('click', function () {
					$('body #UnfollowTranslationhref').hide();
					$('body #UnfollowTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#UnfollowTranslationhref', function() {
					if ($('#socialoptionscontent').is(':hidden')) {
						$('#socialoptionscontent').toggle();
						$('#socialoptionsadditional').toggle();
					}
				});
		//Follow Text
			//Typing
				$('#FollowTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #FollowTranslationhref').hide();
						$('body #FollowTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #FollowTranslationhref').show();
						$('body #FollowTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#followbuttonreset').on('click', function () {
					$('body #FollowTranslationhref').hide();
					$('body #FollowTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#FollowTranslationhref', function() {
					if ($('#socialoptionscontent').is(':hidden')) {
						$('#socialoptionscontent').toggle();
						$('#socialoptionsadditional').toggle();
					}
				});
		//Screen Heading
			//Typing
				$('#ScreenHeadingTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #ScreenHeadingTranslationhref').hide();
						$('body #ScreenHeadingTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #ScreenHeadingTranslationhref').show();
						$('body #ScreenHeadingTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#otheroptionsreset').on('click', function () {
					$('body #ScreenHeadingTranslationhref').hide();
					$('body #ScreenHeadingTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#ScreenHeadingTranslationhref', function() {
					if ($('#additionaloptionscontent').is(':hidden')) {
						$('#additionaloptionscontent').toggle();
						$('#additionaloptionsadditional').toggle();
					}
				});
		//Search Bar
			//Typing
				$('#SearchBarTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #SearchBarTranslationhref').hide();
						$('body #SearchBarTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #SearchBarTranslationhref').show();
						$('body #SearchBarTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#otheroptionsreset').on('click', function () {
					$('body #SearchBarTranslationhref').hide();
					$('body #SearchBarTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#SearchBarTranslationhref', function() {
					if ($('#additionaloptionscontent').is(':hidden')) {
						$('#additionaloptionscontent').toggle();
						$('#additionaloptionsadditional').toggle();
					}
				});
		//Followers
			//Typing
				$('#FollowersTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #FollowersTranslationhref').hide();
						$('body #FollowersTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #FollowersTranslationhref').show();
						$('body #FollowersTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#otheroptionsreset').on('click', function () {
					$('body #FollowersTranslationhref').hide();
					$('body #FollowersTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#FollowersTranslationhref', function() {
					if ($('#additionaloptionscontent').is(':hidden')) {
						$('#additionaloptionscontent').toggle();
						$('#additionaloptionsadditional').toggle();
					}
				});
		//Views
			//Typing
				$('#ViewsTranslation').on('keyup', function() {
					var text = $(this).val();
					if(text != '') {
						$('body #ViewsTranslationhref').hide();
						$('body #ViewsTranslationhref').addClass('fixed');
						errorfixing();
					} else {
						$('body #ViewsTranslationhref').show();
						$('body #ViewsTranslationhref').removeClass('fixed');
					}
				});
			//Reset Button
				$('#otheroptionsreset').on('click', function () {
					$('body #ViewsTranslationhref').hide();
					$('body #ViewsTranslationhref').addClass('fixed');
				});
			//Parent Div Closed
				$('#message').on('click', '#ViewsTranslationhref', function() {
					if ($('#additionaloptionscontent').is(':hidden')) {
						$('#additionaloptionscontent').toggle();
						$('#additionaloptionsadditional').toggle();
					}
				});

});