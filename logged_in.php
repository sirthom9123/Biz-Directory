<div class="headerdetails">
      <div class="pull-left">
        <ul class="nav topcart pull-left">
          <li class="dropdown hover">
            <a href="#" class="dropdown-toggle myaccount" style="padding:7px 10px"><span class="icon-user"></span> <?php echo $names; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu topcartopen ">
              <li>
                <table>
                  <tbody>
                    <tr>
                      <td><span class="icon-envelope"></span><?php echo $email; ?></td>
                    </tr>
                  </tbody>
                </table>
                <table>
					<?php
						$query = "SELECT * FROM company_details WHERE SHA1(username)='$user_session'";
						$subject_set = mysqli_query($connection,$query);
						$row = mysqli_fetch_array($subject_set);

						$reg_no = $row['reg_no'];
						$enterprise_name = $row['enterprise_name'];
						$website = $row['website'];
						
						$query = "SELECT * FROM company_members WHERE reg_no='$reg_no'";
						$subject_set = mysqli_query($connection,$query);
						$row_directors = mysqli_fetch_array($subject_set);

					?>
                  <tbody>
                    <tr>
                      <td class="textleft"><b>Company:</b></td>
                      <td class="textleft"><?php echo $enterprise_name; ?></td>
                    </tr>
                    <tr>
                      <td class="textleft"><b>Reg No:</b></td>
                      <td class="textleft"><?php echo $reg_no; ?></td>
                    </tr>
                    <tr>
                      <td class="textleft"><b>Directors:</b></td>
                      <td class="textleft">
							<?php 
								$query = "SELECT * FROM company_members WHERE reg_no='$reg_no'";
								$subject = mysqli_query($connection,$query);
								
								while($row_directors = mysqli_fetch_array($subject))
								{
									echo $row_directors['surname'].' '.$row_directors['other_names'].'<br/><br/>';
								} 
							?>
					  </td>
                    </tr>
                    <tr>
                      <td class="textleft"><b>Website:</b></td>
                      <td class="textleft"><a href="http://<?php echo $website; ?>"><?php echo $website; ?></a></td>
                    </tr>
                  </tbody>
                </table>
                <div class="well pull-right buttonwrap">
                  <a class="btn btn-orange" href="logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>