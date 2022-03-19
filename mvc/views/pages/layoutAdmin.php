<div>


    <th><a href=/AdminManage/Add >Add user</a></th>
    <th><a href=/AdminManage/ScanAll >Scan All</a></th>
    
    <?php
    $count = 0;
    while ($row = mysqli_fetch_array($data["ip"])) { ?>
        <li>
            <?php echo $row["ip"]; ?>
            <i><?php echo $data["username"][$count++]; ?></i>
            <i><?php echo $row["date"]; ?></i>
            <?php $ip = $row["ip"];
            $id = $row["user_id"];
            ?>
            <i>
                <?php echo "\t" . "<th><a href=/AdminManage/Edit/$id/$ip/>Edit</a> | <th><a href=/AdminManage/Scan/$ip >Scan user</a></th>" ?>
            </i>
        </li>

    <?php }
    ?>
</div>