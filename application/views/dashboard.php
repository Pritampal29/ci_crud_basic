<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style.css">
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>User Management Dashboard</h1>
            <div class="btn-group">
                <a href="<?=base_url();?>/formcontroller/form_save" class="btn btn-primary">Add User</a>
                <a href="" class="btn btn-secondary">Export</a>
            </div>
        </div>

        <?php if($users){ ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){
                    $added_on = $user->added_on;
                    ?>
                <tr>
                    <td><?php echo $user->id;?></td>
                    <td><?php echo $user->name;?></td>
                    <td><?php echo $user->mobile;?></td>
                    <td><?php echo $user->gender;?></td>
                    <td><?php echo $user->skills;?></td>
                    <td><?php echo date("d M Y", strtotime($added_on));?></td>
                    <td>
                        <a href="<?php echo base_url().'/formcontroller/single_data/'.$user->id;?>"
                            class="action-btn edit-btn">Edit</a>
                        <a href="<?php echo base_url().'/formcontroller/delete/'.$user->id;?>"
                            onclick="return confirm('Are you sure ?')" class="action-btn update-btn">Delete</a>
                        <a href="#" class="action-btn update-btn" data-bs-toggle="modal"
                            data-bs-target="#viewModal<?= $user->id; ?>">
                            View
                        </a>

                    </td>
                </tr>
                <!-- View Modal -->
                <div class="modal fade" id="viewModal<?= $user->id; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title"><?= $user->id; ?>. <?= $user->name; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Email:</strong> <?= $user->email; ?></p>
                                        <p><strong>Mobile:</strong> <?= $user->mobile; ?></p>
                                        <p><strong>Gender:</strong> <?= ucfirst($user->gender); ?></p>
                                    </div>

                                    <div class="col-md-6">
                                        <p><strong>Skills:</strong> <?= strtoupper($user->skills); ?></p>
                                        <p><strong>Role:</strong> <?= ucwords($user->role); ?></p>
                                        <p><strong>Added On:</strong> <?= date("d M Y", strtotime($user->added_on)); ?>
                                        </p>
                                        <p><strong>Updated On:</strong>
                                            <?= date("d M Y", strtotime($user->updated_on)); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <h3>No Data to Show</h2>
            <?php } ?>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>