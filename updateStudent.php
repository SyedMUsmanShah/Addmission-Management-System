<?php require_once './inc/connection.php' ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $studentSql = "SELECT * FROM students WHERE id = '$id'";
    $studentResult = mysqli_query($connection, $studentSql);
    if (mysqli_num_rows($studentResult) > 0) {
        while ($row = mysqli_fetch_assoc($studentResult)) {
            $data[] = $row;
        }
        $data = array_shift($data);
    }
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $age = $_POST['age'];
    $dateOfBirth = $_POST['date_of_birth'];
    $contactNumber = $_POST['contact_number'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $domicile = $_POST['domicile'];
    $fatherName = $_POST['father_name'];
    $fatherOccupation = $_POST['father_occupation'];
    $fatherCnic = $_POST['father_cnic'];
    $annualIncome = $_POST['annual_income'];
    $marksMatric = $_POST['marks_matric'];
    $totalMatric = $_POST['total_marks_matric'];
    $schoolName = $_POST['school_name'];
    $marksIntermediate = $_POST['marks_intermediate'];
    $totalIntermediate = $_POST['total_marks_intermediate'];
    $collegeName = $_POST['college_name'];

    if (!empty($_FILES['image']['name'])) {
        unlink('./images/' . $data['image']);
        $image_name = $_FILES['image']['name'];

        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, './images/' . $image_name);
    } else {
        $image_name = $data['image'];
    }



    $updateSql = "UPDATE students SET fname='$fname', uname='$uname', age=$age, date_of_birth='$dateOfBirth', contact_number='$contactNumber', `address`='$address', cnic='$cnic', domicile='$domicile', father_name='$fatherName', father_occupation='$fatherOccupation', father_cnic='$fatherCnic', annual_income='$annualIncome', marks_matric='$marksMatric', total_matric='$totalMatric', school_name='$schoolName', marks_intermediate='$marksIntermediate', total_intermediate='$totalIntermediate', college_name='$collegeName', `image`='$image_name' WHERE id = $id";

    $resultUpdate = mysqli_query($connection, $updateSql);

    // Check if the query was executed successfully
    if ($resultUpdate) {
        header("location:index.php");
    } else {
        // Query execution failed
        // You can handle the error or display an error message here
        die();
    }
}
?>
<?php require_once './inc/header.php' ?>

<div class="col-12">
    <div class="row">
        <?php require_once './inc/sidebar.php' ?>
        <div class="col-9 shadow mt-5 bg-light text-primary p-5">
            <div class="display-4 text-center ">
                Update
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
        
                    <div class="col-6 my-2">
                        <label for="full-name" class="">Full Name</label>
                        <input type="text" class="form-control" id="full-name" value="<?php echo $data['fname'] ?>" name="fname" placeholder="Enter full name">
                    </div>
                    <div class="col-6 my-2">
                        <label for="full-name" class="">User Name</label>
                        <input type="text" class="form-control" id="uname" value="<?php echo $data['uname'] ?>" name="uname" placeholder="Enter user name">
                    </div>
                    <div class="col-6 my-2">
                        <label for="age" class="">Age</label>
                        <input type="number" class="form-control" id="age" value="<?php echo $data['age'] ?>" name="age" placeholder="Enter age">
                    </div>
                    <div class="col-6 my-2">
                        <label for="date-of-birth" class="">Date of Birth</label>
                        <input type="date" class="form-control" id="date-of-birth" value="<?php echo $data['date_of_birth'] ?>" name="date_of_birth">
                    </div>
                    <div class="col-6 my-2">
                        <label for="contact-number" class="">Contact Number</label>
                        <input type="tel" class="form-control" id="contact-number" name="contact_number" value="<?php echo $data['contact_number'] ?>" placeholder="Enter contact number">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Picture</label>
                            <div class="my-4">
        
                                <img src="./images/<?php echo $data['image'] ?>" class="img-fluid" style="height: 140px;" alt="">
                            </div>
                            <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">The picture should not be blur and should have blue background</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="address" class="">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"><?php echo $data['address'] ?></textarea>
                    </div>
                    <div class="col-6 my-2">
                        <label for="cnic" class="">CNIC</label>
                        <input type="text" class="form-control" id="cnic" value="<?php echo $data['cnic'] ?>" name="cnic" placeholder="Enter CNIC">
                    </div>
                    <div class="col-6 my-2">
                        <label for="domicile" class="">Domicile</label>
                        <input type="text" class="form-control" id="domicile" name="domicile" value="<?php echo $data['domicile'] ?>" placeholder="Enter domicile">
                    </div>
                    <div class="col-6 my-2">
                        <label for="father-name" class="">Father Name</label>
                        <input type="text" class="form-control" id="father-name" name="father_name" value="<?php echo $data['father_name'] ?>" placeholder="Enter father's name">
                    </div>
                    <div class="col-6 my-2">
                        <label for="father-occupation" class="">Father Occupation</label>
                        <input type="text" class="form-control" id="father-occupation" name="father_occupation" value="<?php echo $data['father_occupation'] ?>" placeholder="Enter father's occupation">
                    </div>
                    <div class="col-6 my-2">
                        <label for="father-cnic" class="">Father CNIC</label>
                        <input type="text" class="form-control" id="father-cnic" name="father_cnic" value="<?php echo $data['father_cnic'] ?>" placeholder="Enter father's CNIC">
                    </div>
                    <div class="col-6 my-2">
                        <label for="annual-income" class="">Annual Income</label>
                        <input type="text" class="form-control" id="annual-income" name="annual_income" value="<?php echo $data['annual_income'] ?>" placeholder="Enter annual income">
                    </div>
                    <div class="col-6 my-2">
                        <label for="marks-matric" class="">Marks In Matric</label>
                        <input type="text" class="form-control" id="marks-matric" name="marks_matric" value="<?php echo $data['marks_matric'] ?>" placeholder="Enter marks in Matric">
                    </div>
                    <div class="col-6 my-2">
                        <label for="total-marks-matric" class="">Total Marks In Matric</label>
                        <input type="text" class="form-control" id="total-marks-matric" name="total_marks_matric" value="<?php echo $data['total_matric'] ?>" placeholder="Enter total marks in Matric">
                    </div>
        
                    <div class="col-12 my-2">
                        <label for="school-name" class="">School Name</label>
                        <input type="text" class="form-control" id="school-name" name="school_name" value="<?php echo $data['school_name'] ?>" placeholder="Enter school name">
                    </div>
                    <div class="col-6 my-2">
                        <label for="marks-intermediate" class="">Marks In Intermediate</label>
                        <input type="text" class="form-control" id="marks-intermediate" name="marks_intermediate" value="<?php echo $data['marks_intermediate'] ?>" placeholder="Enter marks in Intermediate">
                    </div>
                    <div class="col-6 my-2">
                        <label for="total-marks-intermediate" class="">Total Marks In Intermediate</label>
                        <input type="text" class="form-control" id="total-marks-intermediate" name="total_marks_intermediate" value="<?php echo $data['total_intermediate'] ?>" placeholder="Enter total marks in Intermediate">
                    </div>
                    <div class="col-12 my-2">
                        <label for="college-name" class="">College Name</label>
                        <input type="text" class="form-control" id="college-name" name="college_name" value="<?php echo $data['college_name'] ?>" placeholder="Enter college name">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
</div>


<?php include './inc/footer.php' ?>