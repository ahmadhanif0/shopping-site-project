<?php
include "header.php";
?>

<?php
if (isset($_POST['save'])) {

    include 'config1.php';

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $admin_name = mysqli_real_escape_string($connection, $_POST['admin_name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));
    $com_name = mysqli_real_escape_string($connection, $_POST['com_name']);
    $com_email = mysqli_real_escape_string($connection, $_POST['com_email']);
    $com_phone = mysqli_real_escape_string($connection, $_POST['com_phone']);
    $com_address = mysqli_real_escape_string($connection, $_POST['com_address']);
    $admin_role = mysqli_real_escape_string($connection, $_POST['admin_role']);
    $admin_role = 1;
    $sql = "SELECT username FROM admin WHERE username = '{$username}'";

    $result = mysqli_query($connection, $sql) or die("Query Unsuccessful.");

    if (mysqli_num_rows($result) > 0) {
        echo '<div class="alert alert-danger text-center" role="alert">
                Username already exists.
                </div>';
    } else {
        $sql1 = "INSERT INTO admin (admin_name,username,password,com_name,com_email,com_phone,com_address,admin_role)
                                VALUES ('{$admin_name}','{$username}','{$password}','{$com_name}','{$com_email}','{$com_phone}','{$com_address}','{$admin_role}')";

        if (mysqli_query($connection, $sql1)) {
            header("Location: {$base_url}/admin/admin.php");
        }
    }
}
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add Admin</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Admin Name</label>
                        <input type="text" name="admin_name" class="form-control" placeholder="Admin Name" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="com_name" class="form-control" placeholder="Company Name" required>
                    </div>
                    <div class="form-group">
                        <label>Company Email</label>
                        <input type="email" name="com_email" class="form-control" placeholder="Company Email" required>
                    </div>
                    <div class="form-group">
                        <label>Company Phone</label>
                        <input type="text" name="com_phone" class="form-control" placeholder="Company Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" name="com_address" class="form-control" placeholder="Company Address" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>