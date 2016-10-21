<?php require_once('includes/header.php'); ?>
<script type="text/javascript" src="includes/userstory.js"></script>
<?php require_once('includes/userstory_queries.php'); ?>

<div id="message"></div>

<!-- Start of Form -->
<div class="form">

<div style="clear:both;"></div>

<!-- User Story Info -->
  	<div id="userstorysearchheader" class="userstorysearchheader">User Story</div>
  	<!-- Search Form -->
		<div id="userstorysearchbar">
			<div id="userstorysearchsearchheader" class="btn btn-default btn-block">Show Search Options</div>
			<div id="userstorysearchform" style="display:none;">
				<form>
					<div class="form-group dropdowns" style="width:50%;">
			    		<label>View By Membership</label><br />
						<select id="userstorymembership" class="selectpicker" data-live-search="true" title="Select here" data-width="100%">
				          <?php echo $membershipsoutput; ?>
				        </select>
				    </div>
					<div class="form-group dropdowns" style="width:50%;">
			    		<label>View By User</label><br />
						<select id="userstoryuser" class="selectpicker" data-live-search="true" title="Select here" data-width="100%">
				          <?php echo $usersoutput; ?>
				        </select>
				    </div>
				    <div class="form-group dropdowns" style="width:70%;">
				    	<label>Add Profile Field to Select Membership</label><br />
						<select id="userstoryaddprofilefield" class="selectpicker" data-live-search="true" title="Select here" data-width="100%" multiple>
				          <?php echo $addprofilefieldoutput; ?>
				        </select>
				    </div>
				    <div class="form-group" style="width:15%; float:left;">
				    	<br style="line-height:25px;"/>
				    	<button type="button" id="addprofilefield" class="btn btn-block btn-success">Add Field</button>
				    </div>
				    <div class="form-group" style="width:15%; float:left;">
				    	<br style="line-height:25px;"/>
				    	<button type="button" id="createprofilefield" class="btn btn-block btn-info" data-toggle="modal" data-target="#addprofilefieldmodal">New Field</button>
				    </div>
				    <div style="clear:both;"></div>
				</form>
			</div>
		</div>
		<div id="userstorycontent" class="trendscontent">
			<form>
				<div class="title">Profile Fields for the <strong><span id="userstorymembershiptype"><?php echo $firstmembership; ?></span></strong> Membership</div>
				<div id="userstoryprofileinputs">
					<?php echo $userstoryinitprofileinputs; ?>
				</div>
			</form>
		</div>
<!-- End User Story Info -->

</div>
<!-- End of Form -->

<!-- User Story Demo -->
  <div class="card stats userstorydemo">
    <div class="card-header">Live Demo</div>
    <div class="toparea col-xs-12">
    	<div class="col-xs-3"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></div>
    	<div id="screenheading" class="col-xs-6 title"><?php echo $FeedScreenHeading; ?></div>
    	<div class="col-xs-3"><i class="fa fa-refresh fa-lg pull-right" aria-hidden="true"></i></div>
    </div>
    <input type="text" id="allfeedssearchbar" class="allfeedssearchbar col-xs-12" placeholder="<?php echo $SearchBarTranslation; ?>">
	<div class="userstorybuttons">
		<?php echo $userstorybuttonsoutput; ?>
	</div>
    <div class="card-block">
      <!-- All Feeds Area -->
		<div id="userstorycontent">
			<div id="userstoryuserinfo">
				<div class="userprofilephoto"><img src="includes/images/default_profile.jpg"></div>
				<div class="userprofileusername">User Name</div>
				<div class="userprofileusermembership"><?php echo $firstmembership; ?></div>
			</div>
			<div style="clear:both;"></div>
			<div id="userstoryprofileinfo">
				<?php echo $userstoryinitprofilefieldsoutput; ?>
			</div>
			<div style="clear:both;"></div>
		</div>
    </div>
  </div>

<!-- Add Profile Field Modal -->
	<div class="modal" id="addprofilefieldmodal" tabindex="-1" role="dialog" aria-labelledby="addProfileFieldLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="addProfileFieldLabel">Add New Profile Field</h4>
				</div>
				<div class="modal-body">
					<div class="warning"></div>
					<div class="form-group dropdowns" style="width:100%;">
				    	<label>Check to see if question exists already!</label><br />
						<select id="allprofilequestionsquery" class="selectpicker" data-live-search="true" title="Check here" data-width="100%" multiple>
				          <?php echo $allprofilequestionsoutput; ?>
				        </select>
				    </div>
					<div class="form-group searchinput" style="width:100%;">
						<label>Enter Profile Name</label>
						<div class="info">This is the name that is stored in the database. Don't add in any spaces. A prefix of 'profile_' is automatically added into the database. Users won't see this name.</div>
		            	<input class="form-control" type="text" name="createprofilefieldname" id="createprofilefieldname" placeholder="Enter Profile Name">
		            </div>
		            <div class="form-group searchinput" style="width:100%;">
						<label>Enter Profile Label</label>
						<div class="info">This is the label/question that users will see.</div>
		            	<input class="form-control" type="text" name="createprofilefieldlabel" id="createprofilefieldlabel" placeholder="Enter Profile Label">
		            </div>
		            <div style="clear:both;"></div>
				</div>
				<div class="modal-footer">
					<button type="button" id="createprofilefieldclose" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="createprofilefieldsubmit" class="btn btn-primary">Add Field</button>
				</div>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>