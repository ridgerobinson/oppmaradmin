$(document).ready(function() {

	//Variables

	//Collapsing
		//All Feeds Stats
			$('#allfeedsstatsheader').on('click', function() {
				$('#allfeedsstatscontent').toggle();
				$('#allfeedsstatsadditional').toggle();
				$('#allfeedsstatssearchbar').toggle();
			});

			$('#allfeedsstatsadditional').on('click', function() {
				$('#allfeedsstatscontent').toggle();
				$('#allfeedsstatsadditional').toggle();				
				$('#allfeedsstatssearchbar').toggle();
			});
			//Search Area
				$('#allfeedsstatssearchheader').on('click', function() {
					$('#allfeedsstatssearchform').toggle();
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

	//Load More Button
		$('#allfeeds').on('click', '#loadmorebutton', function() {
			var loadmore = parseInt($(this).attr('rel'));
			var search = $('#search').val();
			var startdate = $('#startdate').val();
			var enddate = $('#enddate').val();
			var categories = $('#categories').val();
			var memberships = $('#memberships').val();

			$.ajax({
				url: 'stats_ajax.php',
				data: {
					loadmore:loadmore,
					search:search,
					startdate:startdate,
					enddate:enddate,
					categories:categories,
					memberships:memberships
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
		//Search Bar
			$('#search').on('keyup', function() {
				var search = $('#search').val();
				var startdate = $('#startdate').val();
				var enddate = $('#enddate').val();
				var categories = $('#categories').val();
				var memberships = $('#memberships').val();

				$.ajax({
					url: 'stats_ajax.php',
					data: {
						search:search,
						startdate:startdate,
						enddate:enddate,
						categories:categories,
						memberships:memberships
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
								if (search != '' || startdate != '' || enddate != '' || categories != null || memberships != null) {
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
							//Days Since
								$('#allfeedsstatsresults').html(result.allfeedsstatsoutput);
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
				});
			});

		//Search By Date
			//Start Date
				$('#startdate').on('change', function() {
					var search = $('#search').val();
					var startdate = $('#startdate').val();
					var enddate = $('#enddate').val();
					var categories = $('#categories').val();
					var memberships = $('#memberships').val();

					$.ajax({
						url: 'stats_ajax.php',
						data: {
							search:search,
							startdate:startdate,
							enddate:enddate,
							categories:categories,
							memberships:memberships
							},
						type: 'POST',
						success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
								if (search != '' || startdate != '' || enddate != '' || categories != null || memberships != null) {
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
							//Days Since
								$('#allfeedsstatsresults').html(result.allfeedsstatsoutput);
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
					});
				});
			//End Date
				$('#enddate').on('change', function() {
					var search = $('#search').val();
					var startdate = $('#startdate').val();
					var enddate = $('#enddate').val();
					var categories = $('#categories').val();
					var memberships = $('#memberships').val();

					$.ajax({
						url: 'stats_ajax.php',
						data: {
								search:search,
								startdate:startdate,
								enddate:enddate,
								categories:categories,
								memberships:memberships
							},
						type: 'POST',
						success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
								if (search != '' || startdate != '' || enddate != '' || categories != null || memberships != null) {
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
							//Days Since
								$('#allfeedsstatsresults').html(result.allfeedsstatsoutput);
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
					});
				});
		
		//Categories
			$('#categories').on('change', function() {
				var search = $('#search').val();
				var startdate = $('#startdate').val();
				var enddate = $('#enddate').val();
				var categories = $('#categories').val();
				var memberships = $('#memberships').val();

				$.ajax({
					url: 'stats_ajax.php',
					data: {
							search:search,
							startdate:startdate,
							enddate:enddate,
							categories:categories,
							memberships:memberships
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
								if (search != '' || startdate != '' || enddate != '' || categories != null || memberships != null) {
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
							//Days Since
								$('#allfeedsstatsresults').html(result.allfeedsstatsoutput);
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
				});
			});
		
		//Memberships
			$('#memberships').on('change', function() {
				var search = $('#search').val();
				var startdate = $('#startdate').val();
				var enddate = $('#enddate').val();
				var categories = $('#categories').val();
				var memberships = $('#memberships').val();

				$.ajax({
					url: 'stats_ajax.php',
					data: {
							search:search,
							startdate:startdate,
							enddate:enddate,
							categories:categories,
							memberships:memberships
						},
					type: 'POST',
					success: function(data) {
						if (!data.error) {
							var result = $.parseJSON(data);
							//Live Demo Area
								//Content
									$('#allfeeds').html(result.feedcelloutput);						
								//Header
								if (search != '' || startdate != '' || enddate != '' || categories != null || memberships != null) {
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
							//Days Since
								$('#allfeedsstatsresults').html(result.allfeedsstatsoutput);
							//Scroll Live Demo to Top
								$('div.card div.card-block').animate({
								   scrollTop: 0
								}, 'fast');
						}
					}
				});
			});

	//Trends
		//Top Users
			$('#trendsoptionstopusers').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();
				var trendsshortcutdaterel = $('.trendsshortcuts div.active').attr('rel');
				if (trendsshortcutdaterel !== 'all') {
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - trendsshortcutdaterel);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);
				} else {
					var trendsshortcutdate = '';
				}

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
								var topusers = new Highcharts.Chart({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									title: {
										text: 'Top Users'
									},
									xAxis: {
										categories: result.users
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
									 		data: feedcount
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
						}
					}
				});
			});

		//Top Categories
			$('#trendsoptionstopcategories').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();
				var trendsshortcutdaterel = $('.trendsshortcuts div.active').attr('rel');
				if (trendsshortcutdaterel !== 'all') {
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - trendsshortcutdaterel);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);
				} else {
					var trendsshortcutdate = '';
				}

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
								var topusers = new Highcharts.Chart({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									title: {
										text: 'Top Categories'
									},
									xAxis: {
										categories: result.categories
									},
									yAxis: {
										title: {
											text: 'Count'
									 	},
										tickInterval: 5
									},
									series: [
										{
											name: 'Number of Feeds',
									 		data: feedcount
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
						}
					}
				});
			});

		//Top Memberships
			$('#trendsoptionstopmemberships').on('click', function() {
				$('#trendsoptions div').removeClass('active');
				$(this).addClass('active');
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();
				var trendsshortcutdaterel = $('.trendsshortcuts div.active').attr('rel');
				if (trendsshortcutdaterel !== 'all') {
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - trendsshortcutdaterel);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);
				} else {
					var trendsshortcutdate = '';
				}

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
								var topusers = new Highcharts.Chart({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									title: {
										text: 'Top Memberships'
									},
									xAxis: {
										categories: result.memberships
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
									 		data: feedcount
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
						}
					}
				});
			});

		//Search Bar
			$('#trendssearch').on('keyup', function() {
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();

				//Top Users Active
					if ($('#trendsoptionstopusers').hasClass('active')) {
						$.ajax({
							url: 'stats_ajax.php',
							data: {
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
										var topusers = new Highcharts.Chart({
											chart: {
												renderTo: 'trendstopusers',
												type: 'bar'
											},
											title: {
												text: 'Top Users'
											},
											xAxis: {
												categories: result.users
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
											 		data: feedcount
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
								}
							}
						});
					}
				//Top Categories Active
					if ($('#trendsoptionstopcategories').hasClass('active')) {
						$.ajax({
							url: 'stats_ajax.php',
							data: {
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
										var topusers = new Highcharts.Chart({
											chart: {
												renderTo: 'trendstopusers',
												type: 'bar'
											},
											title: {
												text: 'Top Categories'
											},
											xAxis: {
												categories: result.categories
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
											 		data: feedcount
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
								}
							}
						});
					}
				//Top Memberships Active
					if ($('#trendsoptionstopmemberships').hasClass('active')) {
						$.ajax({
							url: 'stats_ajax.php',
							data: {
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
										var topusers = new Highcharts.Chart({
											chart: {
												renderTo: 'trendstopusers',
												type: 'bar'
											},
											title: {
												text: 'Top Memberships'
											},
											xAxis: {
												categories: result.memberships
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
											 		data: feedcount
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
								}
							}
						});
					}
			});

		//Search By Date
			//Start Date
				$('#trendsstartdate').on('change', function() {
					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					$.ajax({
						url: 'stats_ajax.php',
						data: {
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
							    for (var i = 0; i < (result.feeds).length; i++) {
							        feedcount[i] = parseFloat(result.feeds[i]);
							    }
								//High Chart
									var topusers = new Highcharts.Chart({
										chart: {
											renderTo: 'trendstopusers',
											type: 'bar'
										},
										title: {
											text: 'Top Users'
										},
										xAxis: {
											categories: result.users
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
										 		data: feedcount
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
							}
						}
					});
				});
			//End Date
				$('#trendsenddate').on('change', function() {
					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					$.ajax({
						url: 'stats_ajax.php',
						data: {
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
							    for (var i = 0; i < (result.feeds).length; i++) {
							        feedcount[i] = parseFloat(result.feeds[i]);
							    }
								//High Chart
									var topusers = new Highcharts.Chart({
										chart: {
											renderTo: 'trendstopusers',
											type: 'bar'
										},
										title: {
											text: 'Top Users'
										},
										xAxis: {
											categories: result.users
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
										 		data: feedcount
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
							}
						}
					});
				});
		
		//Categories
			$('#trendscategories').on('change', function() {
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();

				console.log(trendscategories);

				$.ajax({
					url: 'stats_ajax.php',
					data: {
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
						    for (var i = 0; i < (result.feeds).length; i++) {
						        feedcount[i] = parseFloat(result.feeds[i]);
						    }
							//High Chart
								var topusers = new Highcharts.Chart({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									title: {
										text: 'Top Users'
									},
									xAxis: {
										categories: result.users
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
									 		data: feedcount
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
						}
					}
				});
			});
		
		//Memberships
			$('#trendsmemberships').on('change', function() {
				var trendssearch = $('#trendssearch').val();
				var trendsstartdate = $('#trendsstartdate').val();
				var trendsenddate = $('#trendsenddate').val();
				var trendscategories = $('#trendscategories').val();
				var trendsmemberships = $('#trendsmemberships').val();

				console.log(trendsmemberships);

				$.ajax({
					url: 'stats_ajax.php',
					data: {
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
						    for (var i = 0; i < (result.feeds).length; i++) {
						        feedcount[i] = parseFloat(result.feeds[i]);
						    }
							//High Chart
								var topusers = new Highcharts.Chart({
									chart: {
										renderTo: 'trendstopusers',
										type: 'bar'
									},
									title: {
										text: 'Top Users'
									},
									xAxis: {
										categories: result.users
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
									 		data: feedcount
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
						}
					}
				});
			});

		//Trend Date Buttons
			//Day
				$('#trendssearchday').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - 1);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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

									}
								}
							});
						}
					//Top Categories Active
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});
			//Week
				$('#trendssearchweek').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - 7);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Categories Active
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});
			//Month
				$('#trendssearchmonth').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - 30);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Categories Active
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});
			//Six Months
				$('#trendssearchsixmonths').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - 180);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Categories Active
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});
			//Year
				$('#trendssearchyear').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');
					var trendsshortcutdate = new Date();
					trendsshortcutdate.setDate(trendsshortcutdate.getDate() - 365);
					trendsshortcutdate = trendsshortcutdate.toISOString().slice(0,10);

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Categories Active
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});
			//All
				$('#trendssearchall').on('click', function() {
					$('.trendsshortcuts div').removeClass('active');
					$(this).addClass('active');

					var trendssearch = $('#trendssearch').val();
					var trendsstartdate = $('#trendsstartdate').val();
					var trendsenddate = $('#trendsenddate').val();
					var trendscategories = $('#trendscategories').val();
					var trendsmemberships = $('#trendsmemberships').val();

					//Top Users Active
						if ($('#trendsoptionstopusers').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Users'
														},
														xAxis: {
															categories: result.users
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Categories Active
						if ($('#trendsoptionstopcategories').hasClass('active')) {
							$.ajax({
								url: 'stats_ajax.php',
								data: {
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

									    var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Categories'
														},
														xAxis: {
															categories: result.categories
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
														 		data: feedcount
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
									}
								}
							});
						}
					//Top Memberships Active
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

							    		var topusers = new Highcharts.Chart({
														chart: {
															renderTo: 'trendstopusers',
															type: 'bar'
														},
														title: {
															text: 'Top Memberships'
														},
														xAxis: {
															categories: result.memberships
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
														 		data: feedcount
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

									}
								}
							});
						}
				});

});