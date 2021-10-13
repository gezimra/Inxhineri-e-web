<script src="/admin/js.]/user.js"></script>

<form id="addUserForm" action="/admin/addProcess" method="POST">
<input type="hidden" name="id"  value="<?php if(isset($viewData['user']->id)) echo $viewData['user']->id; ?>" /><br/>
<label>Emri</label>
<input type="text" name="firstname"  value="<?php if(isset($viewData['user']->firstname)) echo $viewData['user']->firstname; ?>"  /><br/>
<label>Mbiemri</label>
<input type="text" name="lastname"   value="<?php if(isset($viewData['user']->lastname)) echo $viewData['user']->lastname; ?>"/><br/>
<label>Username</label>
<input type="text" name="username" value="<?php if(isset($viewData['user']->lastname)) echo $viewData['user']->username; ?>"/><br/>
<label>Passsword</label>
<input type="password" name="password" placeholder="Unchanged" /><br/>
<label>Passsword</label>
<select name="role_id">
    <?php if(isset($viewData['roles'])) {
        foreach($viewData['roles'] as $role) {
            if(isset($viewData['user']->role_id) && $viewData['user']->role_id === $role->id) {
                echo '<option value="'.$role->id.'" selected>'.$role->name.'</option>';
            } else {
                echo '<option value="'.$role->id.'">'.$role->name.'</option>';
            }
          
        }
    }
    ?>
</select><br/>
<label>Aktiv</label>
<input type="checkbox" name="active" value="1" <?php if(isset($viewData['user']->active) && $viewData['user']->active == 1) echo 'checked="checked";' ?> /><br/>

<input type="submit" value="<?php echo (isset($viewData['user'])) ?  "Modifiko" :  "Regjistro"; ?>" />
</form>
