<header class="header">

<section class="flex">
   <a href="../auth/dashboard.php" class="logo">Logo</a>

   <nav class="navbar">
      <a href="../auth/dashboard.php">Dashboard</a>
      <a href="../auth/add-quiz.php">Add Quiz</a>
      <a href="../auth/add-questions.php">Add Questions</a>
      <a href="../auth/result.php">Result</a>
   </nav>

   <div class="icons">
      <span>Hellow <?php echo $_SESSION['name']; ?></span>
      <a href="../process/logout.php" class="delete-btn"><i class="uil uil-sign-out-alt"></i> logout</a>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</section>
</header>