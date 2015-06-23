<div class="options_three">
    <div class="noborder3x">
        <?php Login_Model::login_menu(); ?>
    </div>
    <div class="noborder8x">
        <table border="1px">
            <tr>
                <td>id</td>
                <td>email</td>
                <td>username</td>
                <td>password</td>
                <td>name</td>
                <td>surname</td>
                <td>tel</td>
                <td>active</td>
                <td>own</td>
                <td>Address</td>
                <td>EDIT</td>
            </tr>
            <?php
            $user = $this->user;
                $l = HOMEPAGE.'login/user/';
                
            foreach ($user as $k=>$v){
                echo '<tr>
                    <td>'.$user[$k]['u_id'].'</td>
<td>'.$user[$k]['u_email'].'</td>
<td>'.$user[$k]['u_username'].'</td>
<td>****</td>
<td>'.$user[$k]['u_name'].'</td>
<td>'.$user[$k]['u_surname'].'</td>
<td>'.$user[$k]['u_tel'].'</td>
<td>'.$user[$k]['u_active'].'</td>
<td>'.$user[$k]['u_own'].'</td>
<td>'.$user[$k]['Address'].'</td>
                <td><a href="'.$l.'edit/'.$user[$k]['u_id'].'" style="float:left;width:14px;">
                <img src="'.imagelink.'icon/edit.png" style="float:left;width:14px;"/></a>
                    <a href="javascript:delete_id(\''.$user[$k]['u_id'].'\')" style="float:left;width:14px;">
                    <img src="'.imagelink.'icon/delete.png" style="float:left;width:14px;" /></a>
                        </td>
    </tr>
                    ';
                
                
            }
            ?>
        </table>
    </div>
    <div class="noborder3x">
        <?php
        if ($_GET['alert']) {
            echo $_GET['alert'];
        }
        ?>
    </div>
</div>
<script type="text/javascript">

   function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='<?php echo $l.'delete/';?>'+id;
     }
}
</script>