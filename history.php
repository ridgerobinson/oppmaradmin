<?php require_once('includes/header.php'); ?>

<?php

$output = '';
$output1 = '';

//Top Memberships
	$trendstopmembershipsquery="SELECT
									sum(a.feedcount) Sum,
									m.membership_name MembershipsName
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
										WHERE f.feed_type!='1'
										GROUP BY f.id) AS hf
								  		GROUP BY hf.id) a
								JOIN ".MASTER_DB_NAME.".memberships m ON a.membershipsid = m.id
								GROUP BY a.membershipsid";

    $trendstopmembershipsresult = $mysqli->query($trendstopmembershipsquery) or die($mysqli->error.__LINE__);

    if($trendstopmembershipsresult->num_rows > 0) {
		while($trendstopmembershipsrow = $trendstopmembershipsresult->fetch_assoc()) {
			$output .= '<tr>';
			$output .= '<td>'.$trendstopmembershipsrow['MembershipsName'].'</td>';
			$output .= '<td>'.$trendstopmembershipsrow['Sum'].'</td>';
			$output .= '</tr>';
		}
	}

		$trendstopmembershipsquery1="SELECT
										a.MembershipName MembershipName,
										COUNT(*) Feeds
									FROM (SELECT
											m.membership_name MembershipName
										FROM ".DB_NAME.".opp_feeds f
										JOIN ".DB_NAME.".opp_category_feeds cf ON f.id = cf.feed_id
										JOIN ".DB_NAME.".opp_categories c ON c.id = cf.category_id
										JOIN ".MASTER_DB_NAME.".users u ON u.id = f.user_id
									    JOIN ".MASTER_DB_NAME.".memberships m ON u.membership_id = m.id
										WHERE f.feed_type!='1'
										GROUP BY f.id
										ORDER BY f.unix_timestamp DESC) a
									    GROUP BY a.MembershipName
									ORDER BY a.MembershipName
									LIMIT 10";

        $trendstopmembershipsresult1 = $mysqli->query($trendstopmembershipsquery1) or die($mysqli->error.__LINE__);

        if($trendstopmembershipsresult1->num_rows > 0) {
			while($trendstopmembershipsrow1 = $trendstopmembershipsresult1->fetch_assoc()) {
				$output1 .= '<tr>';
				$output1 .= '<td>'.$trendstopmembershipsrow1['MembershipName'].'</td>';
				$output1 .= '<td>'.$trendstopmembershipsrow1['Feeds'].'</td>';
				$output1 .= '</tr>';
			}
		}

?>

<table class="table">
	<thead>
		<th>Membership Name</th><th>Feed Count</th>
	</thead>
	<tbody><?php echo $output; ?></tbody>
</table>

<table class="table">
	<thead>
		<th>Membership Name</th><th>Feed Count</th>
	</thead>
	<tbody><?php echo $output1; ?></tbody>
</table>