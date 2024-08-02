<?php
// include header file
include 'header.php'; ?>
<div class="admin-content-container">
    <h2 class="admin-heading">Admin Panel</h2>
    <a class="add-new pull-right" href="add-admin.php">Add New Admin</a>
    <?php
    // database configuration
    include 'config.php';

    // Create a new instance of the Database1 class
    $database = new Database1();

    // Check if the connection was successful
    if ($database->isConnected()) {
        // Perform the query using the sql method
        $sql = "SELECT * FROM admin ORDER BY admin_id ";
        $database->sql($sql);

        // Get the results
        $result = $database->getResult();

        if (count($result) > 0) { ?>

            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th>Admin Id</th>
                    <th>Admin Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td class='id'><?php echo $row["admin_id"] ?></td>
                            <td><?php echo $row["admin_name"] ?></td>
                            <td><?php echo $row["username"] ?></td>
                            <td>
                                <?php
                                // if ($row["admin_role"] == '1') {
                                //     echo "Super Admin";
                                // } else {
                                //     echo "Normal Admin";
                                // }
                                echo $row['admin_role'] == 1 ? 'Admin' : ($row['admin_role'] == 0 ? 'Admin' : 'Admin');

                                echo "</td>
                                
                        <td class='edit'><a href='update_admin.php?id={$row['admin_id']}'><i class='fa fa-edit'></i></a>
                        <a class=btn btn-xs btn-danger delete_user href='delete_admin.php?id={$row['admin_id']}'><i class='fa fa-trash'></i></a>
                        </td>
                    </tr>";
                                ?>

                            <?php } ?>
                </tbody>
            </table>
    <?php
        } else {
            echo "0 results";
        }
    } else {
        echo "Database connection failed: " . implode(", ", $database->getResult());
    }
    ?>

    <!-- Footer Start-->
    <div style="position: fixed; bottom: 0; width: 100%; margin: 0 -20px;
     background-color: #E93700; 
     color: #fff; text-align: center; padding: 5px 0;">
        <?php
        $db = new Database();
        $db->select('options', 'footer_text', null, null, null, null);
        $result = $db->getResult();

        if (count($result) > 0) { ?>
            <span><?php echo $result[0]['footer_text']; ?></span>
        <?php } else { ?>
            <span>Created By unknown</span>
        <?php }
        ?>
    </div>

    <!-- Footer End-->