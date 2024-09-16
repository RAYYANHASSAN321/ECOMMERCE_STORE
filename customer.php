<?php
include 'db_header.php';
if(isset($_POST['submit'])){
    $c_name = $_POST['cname'];
    $c_contact = $_POST['ccontact'];
    $c_email = $_POST['cemail'];
    $c_password = $_POST['cpassword'];
    $c_address = $_POST['caddress'];
    $query = "INSERT INTO customer(c_name , c_contact , c_email , c_password , c_address) VALUES ('$c_name' , '$c_contact'  , '$c_email'  , '$c_password' , '$c_address')";
    $runn = mysqli_query($conn , $query);
    if($runn){
        echo "
            <script>
                alert('Record inserted!');
            </script>
        ";
    }
}
?>
<h1 class="text-center">Customer</h1>
<form action="" class="my-4" method="POST">
    <div class="col-6 m-auto py-2">
        <input type="text" class="form-control border px-2" require name="cname" placeholder="Enter your name......">
    </div>
    <div class="col-6 m-auto py-2">
        <input type="number" class="form-control border px-2" require name="ccontact" placeholder="Enter your contact no......">
    </div>
    <div class="col-6 m-auto py-2">
        <input type="email" class="form-control border px-2" require name="cemail" placeholder="Enter your email......">
    </div>
    <div class="col-6 m-auto py-2">
        <input type="password" class="form-control border px-2" require name="cpassword" id="myInput" placeholder="Enter strong password......">
        <input type="checkbox" onclick="myFunction()">&nbsp; Show Password
    </div>
    <div class="col-6 m-auto py-2">
        <input type="text" class="form-control border px-2" require name="caddress" placeholder="Enter complete address......">
    </div>
    <div class="col-6 m-auto py-2">
        <input type="submit" class="btn btn-info m-auto" name="submit" value="Submit">
    </div>
</form>
<table class="table text-center">
    <thead>
        <tr>
            <th>S No</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM customer";
        $runn = mysqli_query($conn, $query);
        // echo mysqli_num_rows($runn);
        // print_r(mysqli_fetch_array($runn));
        // $data = mysqli_fetch_array($runn); 
        // echo "<br>"; 
        // echo $data['c_name'];

        $sno = 0; 
        if(mysqli_num_rows($runn)){ 
            while($rows = mysqli_fetch_array($runn)){
        ?>
        <tr>
            <td> <?php echo ++$sno; ?></td>
            <td><?php echo $rows['c_name']; ?></td>
            <td><?php echo $rows['c_contact']; ?></td>
            <td><?php echo $rows['c_email']; ?></td>
            <td><?php echo $rows['c_address']; ?></td>
            <td>
                <a href="customer_delete.php?id=<?php echo $rows['c_id']?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                <a href="customer_update.php?id=<?php echo $rows['c_id']?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php
include "db_footer.php";
?>
