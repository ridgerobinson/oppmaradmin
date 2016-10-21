$(document).ready(function() {

	//Functions
		//Trend Search
			function trendssearchinfo() {
				//Search Variables
				    var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();
					var trendsshortcutdaterel = $('.trendsshortcuts div.active').attr('rel');
					if (trendsshortcutdaterel) {
						if (trendsshortcutdaterel !== 'all') {
							var trendsshortcutdate = new Date();
							trendsshortcutdate.setDate(trendsshortcutdate.getDate() - trendsshortcutdaterel);
							trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);
						} else {
							var trendsshortcutdate = '';
						}
					}
				//High Chart Init
					var topusers = ({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									credits: {
							            text: 'OppMar.com',
							            href: 'http://www.oppmar.com'
							        },
									title: {
										text: ''
									},
									xAxis: {
										categories: []
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
									 		data: []
										}
									],
									lang: {
							            noData: "There are no matches for this search"
							        },
							        noData: {
							            style: {
							                fontWeight: 'bold',
							                fontSize: '15px',
							                color: '#303030'
							            }
							        }
								});
				//Ajax
					//Top Users
						if ($('#trendsoptionstopusers').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
										trendsshortcutdate:trendsshortcutdate,
										trendssearch:trendssearch,
										trendsstartdate:trendsstartdate,
										trendsenddate:trendsenddate,
										trendscategories:trendscategories,
										trendsmemberships:trendsmemberships
									},
								type: 'POST',
								success: function(data) {
									if (!data.error) {
										var result = $.parseJSON(data);
										var feedcount = [];
									    for (var i = 0; i < (result.trendstopusersfeeds).length; i++) {
									        feedcount[i] = parseFloat(result.trendstopusersfeeds[i]);
									    }
									//High Chart
										topusers.xAxis.categories = result.users;
										topusers.series[0].data = feedcount;
										topusers.yAxis.tickInterval = 1;
										topusers.title.text = 'Top Users';
										chart = new Highcharts.Chart(topusers);
									}
								}
							});
						}
					//Top Categories
						if ($('#trendsoptionstopcategories').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
										trendsshortcutdate:trendsshortcutdate,
										trendssearch:trendssearch,
										trendsstartdate:trendsstartdate,
										trendsenddate:trendsenddate,
										trendscategories:trendscategories,
										trendsmemberships:trendsmemberships
									},
								type: 'POST',
								success: function(data) {
									if (!data.error) {
										var result = $.parseJSON(data);
										var feedcount = [];
									    for (var i = 0; i < (result.trendstopcategoriesfeeds).length; i++) {
									        feedcount[i] = parseFloat(result.trendstopcategoriesfeeds[i]);
									    }
									//High Chart
										topusers.xAxis.categories = result.categoriesresults;
										topusers.series[0].data = feedcount;
										topusers.yAxis.tickInterval = 5;
										topusers.title.text = 'Top Categories';
										chart = new Highcharts.Chart(topusers);
									}
								}
							});
						}
					//Top Memberships
						if ($('#trendsoptionstopmemberships').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
										trendsshortcutdate:trendsshortcutdate,
										trendssearch:trendssearch,
										trendsstartdate:trendsstartdate,
										trendsenddate:trendsenddate,
										trendscategories:trendscategories,
										trendsmemberships:trendsmemberships
									},
								type: 'POST',
								success: function(data) {
									if (!data.error) {
										var result = $.parseJSON(data);
										var feedcount = [];
									    for (var i = 0; i < (result.trendstopmembershipsfeeds).length; i++) {
									        feedcount[i] = parseFloat(result.trendstopmembershipsfeeds[i]);
									    }
									//High Chart
										topusers.xAxis.categories = result.membershipsresults;
										topusers.series[0].data = feedcount;
										topusers.yAxis.tickInterval = 5;
										topusers.title.text = 'Top Memberships';
										chart = new Highcharts.Chart(topusers);
									}
								}
							});
						}
					//Top Hashtags
						if ($('#trendsoptionstophashtags').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
										trendsshortcutdate:trendsshortcutdate,
										trendssearch:trendssearch,
										trendsstartdate:trendsstartdate,
										trendsenddate:trendsenddate,
										trendscategories:trendscategories,
										trendsmemberships:trendsmemberships
									},
								type: 'POST',
								success: function(data) {
									if (!data.error) {
										var result = $.parseJSON(data);
										var feedcount = [];
									    for (var i = 0; i < (result.trendstophashtagsfeeds).length; i++) {
									        feedcount[i] = parseFloat(result.trendstophashtagsfeeds[i]);
									    }
									//High Chart
										topusers.xAxis.categories = result.hashtagsresults;
										topusers.series[0].data = feedcount;
										topusers.yAxis.tickInterval = 1;
										topusers.title.text = 'Top Hashtags';
										chart = new Highcharts.Chart(topusers);
									}
								}
							});
						}
			}

		//All Feeds Search
			function allfeedssearch() {
				//Search Variables
					var allfeedssearchsearch = $('#allfeedssearchsearch').val();
					var allfeedssearchstartdate = $('#allfeedssearchstartdate').val();
					var allfeedssearchenddate = $('#allfeedssearchenddate').val();
					var allfeedssearchcategories = $('#allfeedssearchcategories').val();
					var allfeedssearchmemberships = $('#allfeedssearchmemberships').val();
				//Ajax
					$.ajax({
						url: 'stats_ajax.php',
						data: {
							allfeedssearchsearch:allfeedssearchsearch,
							allfeedssearchstartdate:allfeedssearchstartdate,
							allfeedssearchenddate:allfeedssearchenddate,
							allfeedssearchcategories:allfeedssearchcategories,
							allfeedssearchmemberships:allfeedssearchmemberships
							},
						type: 'POST',
						success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
									if (allfeedssearchsearch != '' || allfeedssearchstartdate != '' || allfeedssearchenddate != '' || allfeedssearchcategories != null || allfeedssearchmemberships != null) {
										if (result.searchresults == 1) {
												$('div.stats div.card-header').html(result.searchresults+' Match');
											} else if (result.searchresults == undefined) {
												$('div.stats div.card-header').html('0 Matches');
											} else {
												$('div.stats div.card-header').html(result.searchresults+' Matches');
											}
									} else {
										$('div.stats div.card-header').html('Live Demo');
									}
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
					});
			}

		//Days Since Search
			function dayssincesearch() {
				//Search Variables
					var dayssincesearch = $('#dayssincesearch').val();
					var dayssincestartdate = $('#dayssincestartdate').val();
					var dayssinceenddate = $('#dayssinceenddate').val();
					var dayssincecategories = $('#dayssincecategories').val();
					var dayssincememberships = $('#dayssincememberships').val();
					var dayssinceyourgroups = $('#dayssinceyourgroups').attr('rel');
				//Ajax
					$.ajax({
						url: 'stats_ajax.php',
						data: {
								dayssincesearch:dayssincesearch,
								dayssincestartdate:dayssincestartdate,
								dayssinceenddate:dayssinceenddate,
								dayssincecategories:dayssincecategories,
								dayssincememberships:dayssincememberships,
								dayssinceyourgroups:dayssinceyourgroups
							},
						type: 'POST',
						success: function(data) {
							if (!data.error) {
								var result = $.parseJSON(data);
								$('#dayssinceresults').html(result.dayssinceoutput);
							}
						}
					});
			}

		// function trendsoptionsactive() {
		// 	$('#trendsoptions div').removeClass('active');
		// 	$(this).addClass('active');
		// }

		//To Clear Trends Calendar
			function trendsclearcalendar() {
				$('#trendsstartdate').val('');
				$('#trendsenddate').val('');
			}
		//To Clear All Trends Search
			function trendsclearsearch() {
				var trendssearch = $('#trendssearch').val('');
				$('#trendssearchform .selectpicker').selectpicker('val', '');
				if ($('.trendsshortcuts div.active').length < 1) {
					$('#trendssearchall').addClass('active');
				}
				trendsclearcalendar();
			}
		//To Clear Days Since Calendar
			function dayssinceclearcalendar() {
				$('#dayssincestartdate').val('');
				$('#dayssinceenddate').val('');
			}
		//To Clear Days Since Search
			function dayssinceclearsearch() {
				var dayssincesearch = $('#dayssincesearch').val('');
				$('#dayssincesearchform .selectpicker').selectpicker('val', '');
				$('#dayssinceyourgroups').attr('rel','');
				dayssinceclearcalendar();
			}

	//Add to Group
		$('#addgroupsubmit').on('click', function(e) {
			e.preventDefault();

			var addgroupusers = $('#addgroupusers').val();
			var groupname = $('#addgroupname').val();
			var localStorageName = 'oppmar_'+groupname;

			if (!groupname) {
				$('#addgroupmodal div.warning').html('<p style="color:red;">Please add a name to the group.</p>');
				if (addgroupusers === null) {
					$('#addgroupmodal div.warning').html('<p style="color:red;">Please add a name to the group and please add at least one user to the group.</p>');
				}
			} else if ((localStorage.getItem(localStorageName)) !== null) {
				$('#addgroupmodal div.warning').html('<p style="color:red;">Group name is taken. Please try again.</p>');
				if (addgroupusers === null) {
					$('#addgroupmodal div.warning').html('<p style="color:red;">Group name is already taken and please add at least one user to the group.</p>');
				}
			} else if (addgroupusers === null) {
				$('#addgroupmodal div.warning').html('<p style="color:red;">Please add at least one user to the group.</p>');
			} else {
				localStorage.setItem(localStorageName,addgroupusers);
				$('#addgroupmodal').modal('hide');
				$('#addgroupmodal .selectpicker').selectpicker('val', '');
				$('#addgroupname').val('');
				getGroupsLocalStorage();
			}
		});

		$('#addgroupclose').on('click', function() {
			$('#addgroupmodal .selectpicker').selectpicker('val', '');
			getGroupsLocalStorage();
		});

		function getGroupsLocalStorage() {	
			$('#dayssinceyourgroups').html('<option id="addgameoption" value="Add Group">Add Group</option>');		
			for (var i = 0; i < localStorage.length; i++){
				var key = localStorage.key(i);
				if (key.indexOf('oppmar_') === 0) {
					$('#dayssinceyourgroups').append('<option value="'+localStorage.key(i)+'">'+localStorage.key(i).substring(7)+'</option>');

				}
			}
			$('#dayssinceyourgroups').selectpicker('refresh');
		}

		getGroupsLocalStorage();

		$('#dayssinceyourgroups').on('change', function() {
			if ($(this).val() == 'Add Group') {
				$('#addgroupmodal').modal('show');
			} else {
				var savedsearch = localStorage.getItem($('#dayssinceyourgroups').val());
				savedsearch = savedsearch.split(',');
				$('#dayssinceyourgroups').attr('rel',savedsearch);

				dayssincesearch();
			}
		});

	//Collapsing
		//All Feeds Search Area
			$('#allfeedssearchsearchheader').on('click', function() {
				$('#allfeedssearchsearchform').toggle();
				if ($('#allfeedssearchsearchform').css('display') == 'none') {
					$(this).text('Show Search Options');
				} else {
					$(this).text('Hide Search Options');
				}
			});

		//All Feeds Live Demo Search Bar
			$('#allfeedssearchbar').on('click', function() {
				if ($('#allfeedssearchsearchform').css('display') == 'none') {
					$('#allfeedssearchsearchform').toggle();
					$('#allfeedssearchsearchheader').text('Hide Search Options');
				}
			});

		//Trends
			$('#trendsheader').on('click', function() {
				$('#trendscontent').toggle();
				$('#trendsadditional').toggle();
				$('#trendssearchbar').toggle();
			});

			$('#trendsadditional').on('click', function() {
				$('#trendscontent').toggle();
				$('#trendsadditional').toggle();				
				$('#trendssearchbar').toggle();
			});

			$('#trendssearchheader').on('click', function() {
				$('#trendssearchform').toggle();
				if ($('#trendssearchform').css('display') == 'none') {
					$(this).text('Show Search Options');
				} else {
					$(this).text('Hide Search Options');
				}
			});
		
		//Days Since
			$('#dayssinceheader').on('click', function() {
				$('#dayssincecontent').toggle();
				$('#dayssinceadditional').toggle();
				$('#dayssincesearchbar').toggle();
			});

			$('#dayssinceadditional').on('click', function() {
				$('#dayssincecontent').toggle();
				$('#dayssinceadditional').toggle();				
				$('#dayssincesearchbar').toggle();
			});

			$('#dayssincesearchheader').on('click', function() {
				$('#dayssincesearchform').toggle();
				if ($('#dayssincesearchform').css('display') == 'none') {
					$(this).text('Show Search Options');
				} else {
					$(this).text('Hide Search Options');
				}
			});

	//Load More Button
		$('#allfeeds').on('click', '#loadmorebutton', function() {
			var loadmore = parseInt($(this).attr('rel'));
			var allfeedssearchsearch = $('#allfeedssearchsearch').val();
			var allfeedssearchstartdate = $('#allfeedssearchstartdate').val();
			var allfeedssearchenddate = $('#allfeedssearchenddate').val();
			var allfeedssearchcategories = $('#allfeedssearchcategories').val();
			var allfeedssearchmemberships = $('#allfeedssearchmemberships').val();

			$.ajax({
				url: 'stats_ajax.php',
				data: {
					loadmore:loadmore,
					allfeedssearchsearch:allfeedssearchsearch,
					allfeedssearchstartdate:allfeedssearchstartdate,
					allfeedssearchenddate:allfeedssearchenddate,
					allfeedssearchcategories:allfeedssearchcategories,
					allfeedssearchmemberships:allfeedssearchmemberships
					},
				type: 'POST',
				success: function(data) {
					if (!data.error) {
						var result = $.parseJSON(data);
						$('#allfeeds').html(result.feedcelloutput);
						loadmore+=10;
						$('#allfeeds #loadmorebutton').attr('rel',loadmore);
					}
				}
			});
		});

	//All Feed Stats
		//Clear Button
			$('#allfeedssearchclear').on('click', function(e) {
				var allfeedssearchsearch = $('#allfeedssearchsearch').val('');
				var allfeedssearchstartdate = $('#allfeedssearchstartdate').val('');
				var allfeedssearchenddate = $('#allfeedssearchenddate').val('');

            	$('#allfeedssearchsearchform .selectpicker').selectpicker('val', '');

				e.preventDefault();

				allfeedssearch();
			});
		//Search Bar
			$('#allfeedssearchsearch').on('keyup', function() {
				allfeedssearch();
			});

		//Search By Date
			//Start Date
				$('#allfeedssearchstartdate').on('change', function() {
					allfeedssearch();
				});
			//End Date
				$('#allfeedssearchenddate').on('change', function() {
					allfeedssearch();
				});
		
		//Categories
			$('#allfeedssearchcategories').on('change', function() {
				allfeedssearch();
			});
		
		//Memberships
			$('#allfeedssearchmemberships').on('change', function() {
				allfeedssearch();
			});

	//Days Since
		//Clear Search
			$('#dayssincesearchclear').on('click', function(e) {
				e.preventDefault();
				dayssinceclearsearch();
				dayssincesearch();
			})
		
		//Search Bar
			$('#dayssincesearch').on('keyup', function() {
				dayssincesearch();
			});

		//Search By Date
			//Start Date
				$('#dayssincestartdate').on('change', function() {
					$('.trendsshortcuts div').removeClass('active');
					dayssincesearch();
				});
			//End Date
				$('#dayssinceenddate').on('change', function() {
					$('.trendsshortcuts div').removeClass('active');
					dayssincesearch();
				});
		
		//Categories
			$('#dayssincecategories').on('change', function() {
				dayssincesearch();
			});
		
		//Memberships
			$('#dayssincememberships').on('change', function() {
				dayssincesearch();
			});
	
	//Trends
		//Clear Trend Search
			$('#trendssearchclear').on('click', function(e) {
				e.preventDefault();
				trendsclearsearch();
				trendssearchinfo();
			});
		//Top Users
			$('#trendsoptionstopusers').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				trendssearchinfo();
			});

		//Top Categories
			$('#trendsoptionstopcategories').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				trendssearchinfo();
			});

		//Top Memberships
			$('#trendsoptionstopmemberships').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				trendssearchinfo();;
			});
		
		//Top Hashtags
			$('#trendsoptionstophashtags').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				trendssearchinfo();;
			});

		//Search Bar
			$('#trendssearch').on('keyup', function() {
				trendssearchinfo();
			});

		//Search By Date
			//Start Date
				$('#trendsstartdate').on('change', function() {
					$('.trendsshortcuts div').removeClass('active');
					trendssearchinfo();
				});
			//End Date
				$('#trendsenddate').on('change', function() {
					$('.trendsshortcuts div').removeClass('active');
					trendssearchinfo();
				});
		
		//Categories
			$('#trendscategories').on('change', function() {
				trendssearchinfo();
			});
		
		//Memberships
			$('#trendsmemberships').on('change', function() {
				trendssearchinfo();
			});

		//Trend Date Buttons
			//Day
				$('#trendssearchday').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});
			//Week
				$('#trendssearchweek').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});
			//Month
				$('#trendssearchmonth').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});
			//Six Months
				$('#trendssearchsixmonths').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});
			//Year
				$('#trendssearchyear').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});
			//All
				$('#trendssearchall').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					trendsclearcalendar();
					trendssearchinfo();
				});

});