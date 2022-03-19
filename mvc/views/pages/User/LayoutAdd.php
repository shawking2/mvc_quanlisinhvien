<div class="container">
    <?php
    $date = date('m/d/Y h:i:s a', time());
    $date = date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    ?>
    <form action="./UserManage/Add" method="POST">

        <div class="title">Add</div>
        <a>IP: </a>
            <input class="input-box button" type="text" name="ip" placeholder="192.168..." required>
            <div class="underline"></div>
        <div class="input-box underline">
            
            <div class="col-sm-10">
                <input type="datetime" class="form-control" name="date" value=<?php echo $date ?> readonly>
            </div>
        </div>
        <div class="input-box button">
            <input type="submit" name="buttonAdd" value="Submit">
        </div>
        <div>
            <input type="submit" name="buttonCancel" value="Cancel">
        </div>

    </form>
</div>
