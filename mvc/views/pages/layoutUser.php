<div>
<i style="margin-left: 10px;">
  <form method="post" action="../UserManage/Upload_file" enctype="multipart/form-data" >
            <input  type="file" name="file_name" ></input>
            <input type="submit" name="buttonUpload" value="Upload" style="border-radius: 9%; border: 0.8px solid #a3d1ff ; box-shadow: 1.5px 2px 1px #0000003b; margin-top:10px; background-color: #a3d1ff   ;"/>
        </form>
  </i>
 <th><a href=/UserManage/Add/>Add server</a></th>
    <?php
    $temp = mysqli_fetch_array($data["user"]);
    while($row = mysqli_fetch_array($data["ip"])){ ?>
        <li>
            <?php echo $row["ip"]; ?>
            <i><?php echo $temp["username"]; ?></i>
            <i><?php echo $row["date"]; ?></i>
            <?php $ip = $row["ip"];
            $id = $row["user_id"];
            ?>
            <i>
                <?php echo "\t" . "<th><a href=/UserManage/Edit/$id/$ip/>Edit</a> | <th><a href=/UserManage/Delete/$ip onclick=\"return confirm('Are you sure?')\">Delete</a> | <th><a href=/UserManage/Scan/$ip >Scan user</a></th> " ?>
            </i>
        </li>
    <?php }
    ?>
</div>