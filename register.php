<?php
if (isset($_REQUEST["form_submit"])) {
    $flag = FALSE;
    $data = sanitize($_REQUEST);
        foreach ($data as $item)
        if (!isset($item))
            $flag = TRUE;
        
        
    if (!$flag) {
    
    $name = $data['name'];
    $surname = $data['surname'];
    $email = $data['email'];
    $country = $data['country'];
    $password = $data['password'];
    $r_password = $data['retype_password'];

    




    if ($password != "" && $password == $r_password) {
        include "sql.php";
        $sql = $sql_add_user;
        $result = mysql_query($sql,$GLOBALS['db']);
    } else {
        ?>
<div class="alert-danger" >
    
    <p>Error - Please fill in all the fields!</p>
    
</div>

<?php
    }
    }
}


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="col-lg-6 col-lg-offset-3 well">
    <form class="form-horizontal" action='index.php' method="POST">
        <input type="hidden" name="form_submit" value="1">
        <input type="hidden" name="register" value="1">
        <fieldset>
            <div id="legend">
                <legend class="">Register</legend>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="name">Name</label>
                <div class="controls">
                    <input type="text" id="username" name="name" placeholder="" class="input-xlarge">

                </div>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="surname">Surname</label>
                <div class="controls">
                    <input type="text" id="username" name="surname" placeholder="" class="input-xlarge">

                </div>
            </div>
            <div class="control-group">
                <!-- Username -->
                <label class="control-label"  for="country">Preferred Country</label>
                <div class="controls">
                    <input type="text" id="username" name="country" placeholder="" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <!-- Password -->
                <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                <div class="controls">
                    <input type="password" id="password_confirm" name="retype_password" placeholder="" class="input-xlarge">

                </div>
            </div>

            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success" type="submit"> Register</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
<?php ?>