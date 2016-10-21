<?php include('includes/database.php'); ?>
<?php

//Preset Variables
  $categoriesoutput = '';
  $whereclause = '';
  $categoryvisiblememberships = [];
  $categoryresultcount = 0;
  $editoutput = '';
  $membershipsoutput = '';
  $sortby = ' ORDER BY c.sort_order asc';

//Adding Category
	if(!empty($_POST['categoryname'])) {
		$categoryname = $_POST['categoryname'];
		$categorysort = $_POST['categorysort'];
		if ($_POST['categoryvisiblememberships'] == null) {
			$categoryvisiblememberships = '';
		} else {
			$categoryvisiblememberships = implode(",",$_POST['categoryvisiblememberships']);
		}

		if($categorysort == '') {
			$categorysort = 1;
		}

		$query="INSERT INTO opp_categories (category,sort_order,visiblememberships)
				VALUES ('$categoryname','$categorysort','$categoryvisiblememberships')";

		$mysqli->query($query);
	}

//Edit Category GET Info
	if(!empty($_POST['editid'])) {
		$editid = $_POST['editid'];
		$editquery="SELECT
					c.category CategoryName,
					c.id CategoryID,
					c.sort_order SortOrder,
					c.visiblememberships VisibleMemberships,
					GROUP_CONCAT(' ',m.membership_name ORDER BY m.membership_name) MembershipName
				FROM ".DB_NAME.".opp_categories c
				LEFT JOIN ".MASTER_DB_NAME.".memberships m ON FIND_IN_SET(m.id, c.visiblememberships)
				WHERE (c.id=".$editid.")
				GROUP BY c.id
				ORDER BY c.sort_order";

		$editresult = $mysqli->query($editquery) or die($mysqli->error.__LINE__);

		while($editrow = $editresult->fetch_assoc()) {
			$editcategoryname = $editrow['CategoryName'];
			$editcategorysortorder = $editrow['SortOrder'];
			$editcategoryvisiblememberships = $editrow['VisibleMemberships'];
			$editcategoryvisiblemembershipsarray = explode(',',$editcategoryvisiblememberships);
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
				if (in_array($membershipsrow['MembershipID'], $editcategoryvisiblemembershipsarray)) {
					$membershipsoutput .= '<option value="'.$membershipsrow['MembershipID'].'" selected>'.$membershipsrow['MembershipName'].'</option>';
				}
				else {
					$membershipsoutput .= '<option value="'.$membershipsrow['MembershipID'].'">'.$membershipsrow['MembershipName'].'</option>';
				}
		    }
		  }

		echo '<div class="form-group">
				<label>Category Name</label>
				<input id="editcategoryname" type="text" class="form-control" value="'.$editcategoryname.'" placeholder="Enter Category Name">
			</div>
			<div class="form-group">
				<label>Sort Order</label>
				<input type="number" id="editcategorysort" class="form-control" value="'.$editcategorysortorder.'" placeholder="Sort Order">
			</div>
			<div class="form-group">
            <label>Visible Memberships</label>
              <div>
              	<select id="editcategoryvisiblememberships" class="selectpicker" data-live-search="true" title="View from..." data-width="100%" multiple>'.
                  $membershipsoutput.'
                </select>
              </div>
          </div>';
    }

//Edit Category POST Info
	if(!empty($_POST['editidpost'])) {
		$editidpost = $_POST['editidpost'];
		$editcategoryname = $_POST['editcategoryname'];
		$editcategorysort = $_POST['editcategorysort'];
		if ($_POST['editcategoryvisiblememberships'] == null) {
			$editcategoryvisiblememberships = '';
		} else {
			$editcategoryvisiblememberships = implode(",",$_POST['editcategoryvisiblememberships']);
		}

		if($editcategorysort == '') {
			$editcategorysort = 1;
		}

		$query="UPDATE opp_categories
				SET category='".$editcategoryname."',sort_order='".$editcategorysort."',visiblememberships='".$editcategoryvisiblememberships."'
				WHERE id=".$editidpost."";

		$mysqli->query($query);
	}

//Deleting Category
	if(!empty($_POST['deleteid'])) {
		$deleteid = $_POST['deleteid'];
		$query="DELETE FROM ".DB_NAME.".opp_categories WHERE id='$deleteid'";

		$mysqli->query($query);
	}

//Searching Categories
	if(!empty($_POST['membershiptype'])) {
		$membershiptype = $_POST['membershiptype'];
		$whereclause = " WHERE ";
		if ($membershiptype == 'All') {
			$membershiptype = '';
		}
		$whereclause .= " ((c.visiblememberships LIKE '%".$membershiptype."%') || (c.visiblememberships = '')) ";
	}

	if(!empty($_POST['categorysearch'])) {
		$categorysearch = $_POST['categorysearch'];
		if (strlen($whereclause) > 0) {
			$whereclause .= " AND (c.category LIKE '%".$categorysearch."%')";
		} else {
			$whereclause = " WHERE (c.category LIKE '%".$categorysearch."%')";
		}
	}

//Sorting Categories
	if(!empty($_POST['sortcategorydirection'])) {
		$sortby = " ORDER BY c.category ".$_POST['sortcategorydirection']."";
	}

	if(!empty($_POST['sortsortdirection'])) {
		$sortby = " ORDER BY c.sort_order ".$_POST['sortsortdirection']."";
	}

	if(!empty($_POST['clear'])) {
		$whereclause = '';
	}

//Total Category Count
  	$totalcategoriesquery = "SELECT
								COUNT(id) Categories
							FROM ".DB_NAME.".opp_categories";

	$totalcategoriesresult = $mysqli->query($totalcategoriesquery) or die($mysqli->error.__LINE__);

	while($totalcategoriesrow = $totalcategoriesresult->fetch_assoc()) {
		$totalcategorycount = $totalcategoriesrow['Categories'];
	}

//Category Query
	$categoriesquery = "SELECT
						c.category CategoryName,
						c.id CategoryID,
						c.sort_order SortOrder,
						c.visiblememberships VisibleMemberships,
						GROUP_CONCAT(' ',m.membership_name ORDER BY m.membership_name) MembershipName
					FROM ".DB_NAME.".opp_categories c
					LEFT JOIN ".MASTER_DB_NAME.".memberships m ON FIND_IN_SET(m.id, c.visiblememberships)" . $whereclause .
					"GROUP BY c.id".
					$sortby;

	$categoriesresult = $mysqli->query($categoriesquery) or die($mysqli->error.__LINE__);

//Category
	if($categoriesresult->num_rows > 0) {
	    if($totalcategorycount == 1) {
	      while($categoriesrow = $categoriesresult->fetch_assoc()) {
	        $categoriesoutput .= '<tr>';
	        $categoriesoutput .= '<td>'.$categoriesrow['CategoryName'].'</td>';
	        $categoriesoutput .= '<td>'.$categoriesrow['SortOrder'].'</td>';
	        if ($categoriesrow['MembershipName'] == '') {
	          $categoriesoutput .= '<td>All</td>';
	        } else {
	          $categoriesoutput .= '<td>'.$categoriesrow['MembershipName'].'</td>';
	        }
	        $categoriesoutput .= '<td style="vertical-align:middle;"><button type="button" id="'.$categoriesrow['CategoryID'].'" class="edit btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#editCategory">Edit</button></td>';
	        $categoriesoutput .= '<td style="vertical-align:middle;"><button type="button" class="deletesingle btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteCategorySingle">Delete</button></td>';
	        $categoriesoutput .= '</tr>';

	        $categoryresultcount++;
	      }
	    } else {
	      while($categoriesrow = $categoriesresult->fetch_assoc()) {
	        $categoriesoutput .= '<tr>';
	        $categoriesoutput .= '<td>'.$categoriesrow['CategoryName'].'</td>';
	        $categoriesoutput .= '<td>'.$categoriesrow['SortOrder'].'</td>';
	        if ($categoriesrow['MembershipName'] == '') {
	          $categoriesoutput .= '<td>All</td>';
	        } else {
	          $categoriesoutput .= '<td>'.$categoriesrow['MembershipName'].'</td>';
	        }
	        $categoriesoutput .= '<td style="vertical-align:middle;"><button type="button" id="'.$categoriesrow['CategoryID'].'" class="edit btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#editCategory">Edit</button></td>';
	        $categoriesoutput .= '<td style="vertical-align:middle;"><button type="button" id="'.$categoriesrow['CategoryID'].'" class="delete btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteCategory">Delete</button></td>';
	        $categoriesoutput .= '</tr>';

	        $categoryresultcount++;
	      }
	    }
	} else {
		$categoriesoutput .= '<tr>';
		$categoriesoutput .= '<td colspan=5>There are no matching categories.</td>';
		$categoriesoutput .= '</tr>';
	}

//Search Results Alert
	if(empty($_POST['editid'])) {
		if ($categoryresultcount > 0 ) {
			if ($whereclause == '') {
				echo $categoriesoutput;
			} else {
				if ($categoryresultcount > 1) {
					echo '<tr id="categorysearchresults" class=""><td colspan=5><div class="alert alert-warning alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  There are '.$categoryresultcount.' matching results
					</div></td></tr>'.$categoriesoutput;
				} else {
					echo '<tr id="categorysearchresults" class=""><td colspan=5><div class="alert alert-warning alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  There is '.$categoryresultcount.' matching result
					</div></td></tr>'.$categoriesoutput;
				}
			}
		} else {
			echo $categoriesoutput;
		}
	}

?>

<script type="text/javascript">

$(document).ready(function() {
	$('#categorysearchresults button.close').on('click', function (){
		$('#categorysearchresults').addClass('hidden');
	});
});

</script>