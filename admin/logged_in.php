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
						<td class="textleft"><b>User:</b></td>
						<td class="textleft"><?php echo $user; ?></td>
                    </tr>
                  </tbody>
                </table>
                <table>
					
                  <tbody>
                    <tr>
                      <td class="textleft"><b>Level:</b></td>
                      <td class="textleft"><?php echo $level; ?></td>
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