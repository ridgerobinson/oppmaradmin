<?php include('includes/header.php'); ?>

<script type="text/javascript">

$(document).ready(function() {

  //Add Category
    $('#addcategory').on('click', function(e) {
      e.preventdefault;
      var categoryname = $('#categoryname').val();
      var categorysort = $('#categorysort').val();
      var categoryvisiblememberships = []
      categoryvisiblememberships = $('#categoryvisiblememberships').val();

      $.ajax({
        url: 'categories_ajax.php',
        data: {
          categoryname:categoryname,
          categorysort:categorysort,
          categoryvisiblememberships:categoryvisiblememberships
          },
        type: 'POST',
        success: function(data) {
          if (!data.error) {
            $('#categoriestbody').html(data);
            $('#categoryinput').val('');
            $('#categorysearch').val('');
            $('#viewfrom').val('All');
            $('#categoryname').val('');
            $('#categorysort').val('');
            $('#addCategory .selectpicker').selectpicker('deselectAll');

          }
        }
      });
    });

  //View From
    $("#viewfrom").on('change', function () {
        var membershiptype = $(this).val();
        var categorysearch = $('#categorysearch').val();

        $.ajax({
          url: 'categories_ajax.php',
          data: {
            membershiptype:membershiptype,
            categorysearch:categorysearch
            },
          type: 'POST',
          success: function(data) {
            if (!data.error) {
              $('#categoriestbody').html(data);
            }
          }
        });
    });

  //Search Categories
    $('body #categorysearch').on('keyup', function(e) {
      e.preventdefault;
      var membershiptype = $('#viewfrom').val();
      var categorysearch = $(this).val();
      console.log(categorysearch);

      $.ajax({
          url: 'categories_ajax.php',
          data: {
            categorysearch:categorysearch,
            membershiptype:membershiptype
            },
          type: 'POST',
          success: function(data) {
            if (!data.error) {
              $('#categoriestbody').html(data);
            }
          }
        });
    });

  //Edit Category GET Info
    $('#categoriestable').on('click', '.edit', function (){
      $('.edit').removeAttr('rel');
      var editid = $(this).attr('id');
      $('.edit').attr('rel', editid);

      $.ajax({
        url: 'categories_ajax.php',
        data: {
          editid:editid
          },
        type: 'POST',
        success: function(data) {
          if (!data.error) {
            $('#editcategoryvalues').html(data);
            $('.selectpicker').selectpicker('refresh');
            //console.log(data);
          }
        }
      });
    });

  //Edit Category POST Info
    $('#editcategory').on('click', function(){
      var editidpost = $('.edit').attr('rel');
      var editcategoryname = $('#editcategoryname').val();
      var editcategorysort = $('#editcategorysort').val();
      var editcategoryvisiblememberships = []
      editcategoryvisiblememberships = $('#editcategoryvisiblememberships').val();
      var membershiptype = $('#viewfrom').val();
      var categorysearch = $('body #categorysearch').val();

      console.log('ID '+editidpost);
      console.log('Name '+editcategoryname);
      console.log('Sort '+editcategorysort);
      console.log('VisibleMemberships '+editcategoryvisiblememberships);

      $.ajax({
        url: 'categories_ajax.php',
        data: {
          editidpost:editidpost,
          editcategoryname:editcategoryname,
          editcategorysort:editcategorysort,
          editcategoryvisiblememberships:editcategoryvisiblememberships,
          membershiptype:membershiptype,
          categorysearch:categorysearch
          },
        type: 'POST',
        success: function(data) {
          if (!data.error) {
            $('#categoriestbody').html(data);
          }
        }
      });
    });

  //Delete Category
    $('#categoriestable').on('click', '.delete', function (){
      $('.delete').removeAttr('rel');
      var deleteid = $(this).attr('id');
      $('.delete').attr('rel', deleteid);
    });

    $('#deletecategory').on('click', function(){
      var deleteid = $('.delete').attr('rel');
      $.ajax({
        url: 'categories_ajax.php',
        data: {
          deleteid:deleteid
          },
        type: 'POST',
        success: function(data) {
          if (!data.error) {
            $('#categoriestbody').html(data);
            $('#categoryinput').val('');
            $('#categorysearch').val('');
            $('.selectpicker').selectpicker('val', '');
          }
        }
      });
    });

  //Clear Search
    $('#clearcategorysearch').on('click', function() {
      $('#categorysearch').val('');
      $('.selectpicker').selectpicker('val', '');
      var clear = 'Clear';

      $.ajax({
        url: 'categories_ajax.php',
        data: {
          clear:clear
          },
        type: 'POST',
        success: function(data) {
          if (!data.error) {
            $('#categoriestbody').html(data);
          }
        }
      });
    });

  //Sorting
    //Sort By Category Name
      $('#sortcategory').on('click', function(){
        var sortcategorydirection = $(this).attr('rel');
        var membershiptype = $('#viewfrom').val();
        var categorysearch = $('body #categorysearch').val();

        $.ajax({
          url: 'categories_ajax.php',
          data: {
            sortcategorydirection:sortcategorydirection,
            membershiptype:membershiptype,
            categorysearch:categorysearch
            },
          type: 'POST',
          success: function(data) {
            if (!data.error) {
              $('#categoriestbody').html(data);
            }
          }
        });

        if (sortcategorydirection == 'asc') {
          $(this).attr('rel', 'desc');
        } else if (sortcategorydirection == 'desc') {
          $(this).attr('rel', 'asc');
        }
      });

    //Sort By Category Sort
      $('#sortsort').on('click', function(){
        var sortsortdirection = $(this).attr('rel');
        var membershiptype = $('#viewfrom').val();
        var categorysearch = $('body #categorysearch').val();

        $.ajax({
          url: 'categories_ajax.php',
          data: {
            sortsortdirection:sortsortdirection,
            membershiptype:membershiptype,
            categorysearch:categorysearch
            },
          type: 'POST',
          success: function(data) {
            if (!data.error) {
              $('#categoriestbody').html(data);
            }
          }
        });

        if (sortsortdirection == 'asc') {
          $(this).attr('rel', 'desc');
        } else if (sortsortdirection == 'desc') {
          $(this).attr('rel', 'asc');
        }
      });

});

</script>

<?php
//Preset Variables
  $categoriesoutput = '';
  $membershipsoutput = '';

//Total Category Count
    $totalcategoriesquery = "SELECT
                              COUNT(id) Categories
                            FROM ".DB_NAME.".opp_categories";

    $totalcategoriesresult = $mysqli->query($totalcategoriesquery) or die($mysqli->error.__LINE__);

    while($totalcategoriesrow = $totalcategoriesresult->fetch_assoc()) {
      $totalcategorycount = $totalcategoriesrow['Categories'];
    }

//Categories Query
  $categoriesquery = "SELECT
                        c.category CategoryName,
                        c.id CategoryID,
                        c.sort_order SortOrder,
                        c.visiblememberships VisibleMemberships,
                        GROUP_CONCAT(' ',m.membership_name ORDER BY m.membership_name) MembershipName
                      FROM ".DB_NAME.".opp_categories c
                      LEFT JOIN ".MASTER_DB_NAME.".memberships m ON FIND_IN_SET(m.id, c.visiblememberships)
                      GROUP BY c.id
                      ORDER BY c.sort_order";

  $categoriesresult = $mysqli->query($categoriesquery) or die($mysqli->error.__LINE__);

//Categories
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
      }
    }
  } else {
    $categoriesoutput .= '<tr>';
    $categoriesoutput .= '<td colspan=5>There are no matching categories.</td>';
    $categoriesoutput .= '</tr>';
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
      $membershipsoutput .= '<option value="'.$membershipsrow['MembershipID'].'">'.$membershipsrow['MembershipName'].'</option>';
    }
  }

?>

<!-- Category Card -->
  <div class="category card">
    <div class="card-header">Categories<span class="pull-right"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#addCategory">Add Category</button></span></div>
    <!-- Search Tools -->
    <div class="searchtools">
    <!-- View From Selection Tool -->
      <div class="viewfrom col-lg-3">
        <select id="viewfrom" class="selectpicker" data-live-search="true" title="View from..." data-width="100%">
          <option value="All">All</option>
          <?php echo $membershipsoutput; ?>
        </select>
      </div>
    <!-- Search Input Tool -->
      <div class="col-lg-8">
        <input id="categorysearch" type="text" class="form-control cardsearch" placeholder="Search Category Name">
      </div>
    <!-- Clear Search Button -->
      <div class="col-lg-1">
        <button type="button" id="clearcategorysearch" class="btn btn-danger btn-block">Clear</button>
      </div>
    </div>
    <div class="card-block col-lg-12">
      <table id="categoriestable" class="table">
        <thead>
          <tr><th id="sortcategory" rel="asc">Category</th><th id="sortsort" rel="desc">Sort Order</th><th>Visible Memberships</th><th>Edit</th><th>Delete</th></tr>
        </thead>
        <tbody id="categoriestbody"><?php echo $categoriesoutput; ?></tbody>
      </table>
    </div>
  </div>

<!-- Add Category Modal-->
  <div class="modal" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="addCategoryLabel">Add Category</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input id="categoryname" type="text" class="form-control" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label>Sort Order</label>
            <input type="number" id="categorysort" class="form-control" placeholder="Sort Order">
          </div>
          <div class="form-group">
            <label>Visible Memberships</label>
              <select id="categoryvisiblememberships" class="selectpicker" data-live-search="true" data-width="100%" multiple>
                <?php echo $membershipsoutput; ?>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="addcategory" class="btn btn-primary" data-dismiss="modal">Add</button>
        </div>
      </div>
    </div>
  </div>

<!-- Edit Category Modal-->
  <div class="modal" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="editCategoryLabel">Edit Category</h4>
        </div>
        <div id="editcategoryvalues" class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input id="editcategoryname" type="text" class="form-control" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label>Sort Order</label>
            <input type="number" id="editcategorysort" class="form-control" placeholder="Sort Order">
          </div>
          <div class="form-group">
            <label>Visible Memberships</label>
              <select id="editcategoryvisiblememberships" class="selectpicker" data-live-search="true" data-width="100%" multiple>
                <?php echo $membershipsoutput; ?>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="editcategory" class="btn btn-primary" data-dismiss="modal">Edit</button>
        </div>
      </div>
    </div>
  </div>

<!-- Delete Category Warning (multiple categories left) -->
  <div class="modal" id="deleteCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="deleteCategoryLabel">Delete Category</h4>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this category?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="deletecategory" class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>

<!-- Delete Category Warning (single category left) -->
  <div class="modal" id="deleteCategorySingle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="deleteCategorySingleLabel">Delete Category</h4>
        </div>
        <div class="modal-body">
          You must have a minimum of one category. Please create more to delete this one, or edit this one how you would like.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php'); ?>