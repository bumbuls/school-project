<?php
session_start();
include "../config/database.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $sql = "SELECT * FROM quiz";
    $result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body class="back">
   <?php include "../includes/header.php"; ?>
<section class="home">
   <div class="home-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
               <h3>All Quiz</h3>
               <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Time</th>
                      <th>Total Question</th>
                      <th>Action</th>
                  </tr>
                  </thead>
      
                  <tbody>
                  <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_array($result)){?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['q_name']; ?></td>
                      <td><?php echo $row['q_time']; ?>min</td>
                      <td><?php echo $row['q_tnq']; ?></td>
                      <td>
                          <a href="view-question.php?view=<?php echo $row['q_id']; ?>" class="btn-info">View</a>
                          <a href="edit-quiz.php?q=<?php echo $row['q_id']; ?>" class="btn-primary">Edit</a>
                      </td>
                  </tr>
                    <?php } ?>
                  </tbody>
              </table>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
    <?php
}else{
    header("Location: ../login.php");
    exit();
}
?>