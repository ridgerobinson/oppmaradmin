<?php require_once('includes/header.php'); ?>
<script type="text/javascript" src="includes/stats.js"></script>
<?php require_once('includes/stats_queries.php'); ?>

<!-- Start of Form -->
<div class="form">

<!-- Trends -->
	<div id="trendsheader" class="trendsheader">Trends</div>
	<!-- Search Form -->
		<div id="trendssearchbar">
			<div id="trendssearchheader" class="btn btn-default btn-block">Show Search Options</div>
			<div id="trendssearchform" style="display:none;">
				<div class="trendsshortcuts">
					<div id="trendssearchday" rel="1" class="btn btn-default">Day</div>
					<div id="trendssearchweek" rel="7" class="btn btn-default">Week</div>
					<div id="trendssearchmonth" rel="30" class="btn btn-default">Month</div>
					<div id="trendssearchsixmonths" rel="180" class="btn btn-default">Six Months</div>
					<div id="trendssearchyear" rel="365" class="btn btn-default">Year</div>
					<div id="trendssearchall" rel="all" class="btn btn-default active">All</div>
				</div>
				<div class="form-group dateinput">
					<label>Custom Start Date</label><br />
	            	<input class="form-control" type="date" name="trendsstartdate" id="trendsstartdate" placeholder="Start Date">
	            </div>
	            <div class="form-group dateinput">
	            	<label>Custom End Date</label><br />
	            	<input class="form-control" type="date" name="trendsenddate" id="trendsenddate" placeholder="End Date">
	            </div>
	            <div class="form-group searchinput">
					<label>Enter Search</label>
	            	<input class="form-control" type="text" name="trendssearch" id="trendssearch" placeholder="Filter Trends">
	            </div>
	            <div class="form-group dropdowns">
		    		<label>Categories</label><br />
					<select id="trendscategories" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
			          <?php echo $categoriesoutput; ?>
			        </select>
			    </div>
			    <div class="form-group dropdowns">
		    		<label>Memberships</label><br />
					<select id="trendsmemberships" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
			          <?php echo $membershipsoutput; ?>
			        </select>
			    </div>
			    <div class="form-group clear">
			    	<button id="trendssearchclear" class="btn btn-block btn-danger">Clear Search</button>
			    </div>
			</div>
		<div style="clear:both;"></div>
		</div>
	<div id="trendscontent" class="trendscontent">
		<div id="trendsoptions">
			<div id="trendsoptionstopusers" class="btn btn-default active">Top Users</div>
			<div id="trendsoptionstopcategories" class="btn btn-default">Top Categories</div>
			<div id="trendsoptionstopmemberships" class="btn btn-default">Top Memberships</div>
			<div id="trendsoptionstophashtags" class="btn btn-default">Top #hashtags</div>
		</div>
		<div style="clear:both;"></div>
		<div id="trendstopusers" style="height:400px; width:729px; background-color:black;"></div>
	</div>
	<div id="trendsadditional">Click here to expand</div>
<!-- End Trends -->

<div style="clear:both;"></div>

<!-- Days Since -->
	<div id="dayssinceheader" class="dayssinceheader">Days Since</div>
	<!-- Search Form -->
		<div id="dayssincesearchbar">
			<div id="dayssincesearchheader" class="btn btn-default btn-block">Show Search Options</div>
			<div id="dayssincesearchform" style="display:none;">
				<form>
					<div class="form-group dateinput">
						<label>Start Date</label><br />
		            	<input class="form-control" type="date" name="startdate" id="dayssincestartdate" placeholder="Start Date">
		            </div>
		            <div class="form-group dateinput">
		            	<label>End Date</label><br />
		            	<input class="form-control" type="date" name="enddate" id="dayssinceenddate" placeholder="End Date">
		            </div>
					<div class="form-group searchinput" style="width:100%;">
						<label>Enter Search</label>
		            	<input class="form-control" type="text" name="search" id="dayssincesearch" placeholder="Search Feeds">
		            </div>
		            <div class="form-group dropdowns" style="width:33%;">
			    		<label>Categories</label><br />
						<select id="dayssincecategories" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
				          <?php echo $categoriesoutput; ?>
				        </select>
				    </div>
				    <div class="form-group dropdowns" style="width:33%;">
			    		<label>Memberships</label><br />
						<select id="dayssincememberships" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
				          <?php echo $membershipsoutput; ?>
				        </select>
				    </div>
				    <div class="form-group dropdowns" style="width:34%;">
			    		<label>Your Groups</label><br />
						<select id="dayssinceyourgroups" class="selectpicker" data-live-search="true" title="Select here" data-width="100%">		          
				        </select>
				    </div>
				    <div class="form-group clear">
				    	<button id="dayssincesearchclear" class="btn btn-block btn-danger">Clear Search</button>
				    </div>
				    <div style="clear:both;"></div>
				</form>
			</div>
			<div id="groups"></div>
		</div>
	<div id="dayssincecontent" class="dayssincecontent">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>User</th>
					<th>Last Post</th>
					<th>Days Since</th>
				</tr>
			</thead>
			<tbody id="dayssinceresults">
				<?php echo $dayssinceoutput; ?>
			</tbody>
		</table>
	</div>
	<div id="dayssinceadditional">Click here to expand</div>
<!-- End All Feed Stats -->

</div>
<!-- End of Form -->



<!-- All Feeds -->
  <div class="card stats livedemo">
  	<div id="allfeedssearchheader" class="allfeedssearchheader">Search All Feeds</div>
  	<!-- Search Form -->
		<div id="allfeedssearchsearchbar">
			<div id="allfeedssearchsearchheader" class="btn btn-default btn-block">Show Search Options</div>
			<div id="allfeedssearchsearchform" style="display:none;">
				<form>
					<div class="form-group dateinput">
						<label>Start Date</label><br />
		            	<input class="form-control" type="date" name="startdate" id="allfeedssearchstartdate" placeholder="Start Date">
		            </div>
		            <div class="form-group dateinput">
		            	<label>End Date</label><br />
		            	<input class="form-control" type="date" name="enddate" id="allfeedssearchenddate" placeholder="End Date">
		            </div>
					<div class="form-group searchinput">
						<label>Enter Search</label>
		            	<input class="form-control" type="text" name="search" id="allfeedssearchsearch" placeholder="Search Feeds">
		            </div>
		            <div class="form-group dropdowns">
			    		<label>Categories</label><br />
						<select id="allfeedssearchcategories" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
				          <?php echo $categoriesoutput; ?>
				        </select>
				    </div>
				    <div class="form-group dropdowns">
			    		<label>Memberships</label><br />
						<select id="allfeedssearchmemberships" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
				          <?php echo $membershipsoutput; ?>
				        </select>
				    </div>
				    <div class="form-group clear">
				    	<button id="allfeedssearchclear" class="btn btn-block btn-danger">Clear Search</button>
				    </div>
				    <div style="clear:both;"></div>
				</form>
			</div>
		</div>
    <div class="card-header">Live Demo</div>
    <div class="toparea col-xs-12">
    	<div class="col-xs-3"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></div>
    	<div id="screenheading" class="col-xs-6 title"><?php echo $FeedScreenHeading; ?></div>
    	<div class="col-xs-3"><i class="fa fa-refresh fa-lg pull-right" aria-hidden="true"></i></div>
    </div>
    <a href="#allfeedssearchsearch"><input type="text" id="allfeedssearchbar" class="allfeedssearchbar col-xs-12" placeholder="<?php echo $SearchBarTranslation; ?>"></a>
	<div class="filterbuttons">
		<?php echo $feedfiltersoutput; ?>
	</div>
    <div class="card-block">
      <!-- All Feeds Area -->
		<div id="allfeeds">
			<?php echo $feedcelloutput; ?>
			<button id="loadmorebutton" rel="20" class="btn btn-block">Load More</button>
		</div>
    </div>
  </div>

<!-- Add Group Modal -->
	<div class="modal" id="addgroupmodal" tabindex="-1" role="dialog" aria-labelledby="addGroupLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="addGroupLabel">Add Group</h4>
				</div>
				<div class="modal-body">
					<div class="warning"></div>
					<div class="form-group searchinput" style="width:100%;">
						<label>Enter Group Name</label>
		            	<input class="form-control" type="text" name="addgroupname" id="addgroupname" placeholder="Enter Group Name">
		            </div>
		            <div class="form-group dropdowns" style="width:100%;">
			    		<label>Add Users</label><br />
						<select id="addgroupusers" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple mobile="true">
				          <?php echo $usersoutput; ?>
				        </select>
				    </div>
		            <div style="clear:both;"></div>
				</div>
				<div class="modal-footer">
					<button type="button" id="addgroupclose" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="addgroupsubmit" class="btn btn-primary">Add Group</button>
				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>