<table class="table table-striped table-bordered table-hover">
              <input style="width:50%; display: none;" class="form-control" type="text" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
              <thead class="bg-dark">
                <th class="text-white">Sr No</th>
                <th class="text-white">Type</th>
                <th class="text-white">Percentage</th>

                <th class="text-white">Description</th>

              </thead>
              <?php
              $output6 = "";
              $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
              $statement6 = $connect->prepare($query6);
              $statement6->execute();
              if ($statement6->rowCount() > 0) {
                $result6 = $statement6->fetchAll();
                $sn6 = 1;
                foreach ($result6 as $key => $row6) {
              ?>
                  <tr>
                    <?php

                    if ($key == 5) {

                      echo "<td>-</td>";
                    } elseif ($key == 1) {

                      echo "<td>1/2</td>";
                    } elseif ($key == 0) {

                      echo "<td>0</td>";
                    } else {

                      $next_key = $key + 1;

                      echo "<td> $next_key </td>";
                    }



                    ?>

                    <td>
                      <h6 style="color:<?php echo $row6['color']; ?>;font-size: large; font-weight:bold;"><?php echo $row6['percentagetype']; ?></h6>
                    </td>
                    <td style="text-align:center;"><?php echo $row6['percentage']; ?></td>

                    <td style="text-align:center;"><?php echo $row6['description']; ?></td>

                  </tr>
              <?php
                }
              }
              ?>
            </table>