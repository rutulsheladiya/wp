<?php
include 'connection/connection.php';
 error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["username"])) {
        $UsernameError = "username is required";
      }

      if (empty($_POST["firstname"])) {
        $FirstnameError = "Firstname is required";
      }

      if (empty($_POST["firstname"])) {
        $AddressError = "Address is required";
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .hobbies{
        display: flex;
         justify-content: space-between;
        }
        .error {color: #FF0000;}
    </style>
</head>
<body>

    <section>
       <h3 class="text-center mt-3">Add User</h3> 
         <div class="container-fluid mt-5 col-6">
           
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                  <label for="">User Name</label>
                  <input type="text" name="username" placeholder="Enter Username" class="form-control">
                  <span class="error">* <?php echo $UsernameError; ?></span>
                </div>

                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="firstname" placeholder="Enter Firstname" class="form-control">
                  <span class="error">* <?php echo  $FirstnameError; ?></span>
                </div>

                <div class="form-group">
                  <label for="">Enter Address</label>
                  <textarea name="address" class="form-control" cols="30" rows="10"></textarea>
                  <span class="error">* <?php echo  $AddressError; ?></span>
                </div>

                <div class="form-group">
                    <label for="" class="mr-4">Gender</label>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sex" value="male">
                       <label class="form-check-label" for="">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sex" value="female">
                       <label class="form-check-label" for="">Female</label>
                    </div>
                </div>


                <div class="form-group">
                  <div class="form-group col-md-4">
                     <label for="inputState">Select Country</label>
                     <select id="inputState" class="form-control" name="country">
                      <option selected disabled>Select Country</option>
                      <option>India</option>
                      <option>USA</option>
                      <option>UK</option>
                      <option>NZ</option>
                     </select>
                  </div>
                 </div>

                <div class="form-group row">
                    <div class="col-sm-2">Hobbies</div>
                       <div class="col-sm-10 hobbies">
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="cricket">
                           <label class="form-check-label" for="gridCheck1">Cricket</label>
                         </div>

                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="Chess">
                           <label class="form-check-label" for="gridCheck1">Chess</label>
                         </div>

                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="Football">
                           <label class="form-check-label" for="gridCheck1">Football</label>
                         </div>

                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobbie[]" value="Music">
                           <label class="form-check-label" for="gridCheck1">Music</label>
                         </div>
                        </div>
                    </div> 
                </div> 

                <div class="form-group text-center mt-5">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">
                </div>
             </form>
             <?php
if(isset($_POST['submit'])){
    if($UsernameError == "" && $FirstnameError == "" && $AddressError == ""){
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $address = $_POST['address'];
        $gender = $_POST['sex'];
        $country = $_POST['country'];
        $hobbies = $_POST['hobbie'];
         $chk = "";
         foreach($hobbies as $chk1){
              $chk.= $chk1.",";  
         }
     
         $sql = "INSERT INTO `employee`(`id`, `username`, `firstname`, `address`, `gender`, `country`, `hobbies`, `creationdate`) 
         VALUES ('', '$username', '$firstname', '$address', '$gender', '$country', '$chk', current_timestamp())";
         $result = mysqli_query($conn,$sql);
         header("location:index.php");
    }
}
             ?>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</body>
</html>