<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo !empty($users->id) ? 'Update User Form' : 'Insert User Form';?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style.css">
</head>

<body>

    <div class="form-container">
        <div class="header">
            <h2><?php echo !empty($users->id) ? 'Update Form' : 'Add Form';?></h2>
            <div class="btn-group">
                <a href="<?php echo base_url('/formcontroller/');?>" class="btn btn-primary">User List</a>
            </div>
        </div>

        <form method="POST" action="<?php echo base_url('/formcontroller/form_save');?>">
            <input value="<?php echo (!empty($users->id)) ? $users->id : '';?>" type="hidden" name="id"
                class="form-control" placeholder="Enter User ID">

            <div class="form-group">
                <label for="name">Full Name</label>
                <input value="<?php echo (!empty($users->name)) ? $users->name : '';?>" type="text" name="name"
                    class="form-control" placeholder="Enter Full Name">
                <?php echo form_error('name','<div class="show_err">','</div>',);?>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input value="<?php echo (!empty($users->email)) ? $users->email : '';?>" type="email" name="email"
                    class="form-control" placeholder="Enter Email">
                <?php echo form_error('email','<div class="show_err">','</div>',);?>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input value="<?php echo (!empty($users->mobile)) ? $users->mobile : '';?>" type="tel" name="mobile"
                    class="form-control" placeholder="Enter Mobile Number">
                <?php echo form_error('mobile','<div class="show_err">','</div>',);?>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="male"
                            <?php echo (!empty($users->gender) && $users->gender == 'male') ? 'checked' : '';?>>
                        Male</label>
                    <label><input type="radio" name="gender" value="female"
                            <?php echo (!empty($users->gender) && $users->gender == 'female') ? 'checked' : '';?>>
                        Female</label>
                    <label><input type="radio" name="gender" value="other"
                            <?php echo (!empty($users->gender) && $users->gender == 'other') ? 'checked' : '';?>>
                        Other</label>
                </div>
                <?php echo form_error('gender','<div class="show_err">','</div>',);?>
            </div>

            <div class="form-group">
                <label>Skills</label>
                <?php if(!empty($users->skills)){
                $skills = $users->skills;
                $skill = explode(',',$skills);
                }
                ?>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="skills[]" value="html"
                            <?php echo (!empty( $skills) && in_array('html',$skill)) ? 'checked' : '' ;?>>
                        HTML</label>
                    <label><input type="checkbox" name="skills[]" value="css"
                            <?php echo (!empty( $skills) && in_array('css',$skill)) ? 'checked' : '' ;?>>
                        CSS</label>
                    <label><input type="checkbox" name="skills[]" value="javascript"
                            <?php echo (!empty( $skills) && in_array('javascript',$skill)) ? 'checked' : '' ;?>>
                        JavaScript</label>
                    <label><input type="checkbox" name="skills[]" value="react"
                            <?php echo (!empty( $skills) && in_array('react',$skill)) ? 'checked' : '' ;?>>
                        React</label>
                    <label><input type="checkbox" name="skills[]" value="php"
                            <?php echo (!empty( $skills) && in_array('php',$skill)) ? 'checked' : '' ;?>>
                        PHP</label>
                </div>
                <?php echo form_error('skills[]','<div class="show_err">','</div>',);?>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" name="role" class="form-control">
                    <option>Select Role</option>
                    <option value="admin"
                        <?php echo (!empty($users->role) && $users->role == 'admin') ? 'selected' : '';?>>Admin</option>
                    <option value="manager"
                        <?php echo (!empty($users->role) && $users->role == 'manager') ? 'selected' : '';?>>Manager
                    </option>
                    <option value="user"
                        <?php echo (!empty($users->role) && $users->role == 'user') ? 'selected' : '';?>>User</option>
                </select>
                <?php echo form_error('role','<div class="show_err">','</div>',);?>
            </div>

            <div class="btn-group">
                <input type="submit" class="btn btn-submit"
                    value="<?php echo !empty($users->id) ? 'Update Data' : 'Insert Data';?>">
            </div>
        </form>
    </div>

</body>

</html>