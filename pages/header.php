<div class="left-section">
<a href="new_post.php"><button class="page-button">Home</button></a>
<a href="search.php"><button class="page-button">Search</button></a>
<a href="profile.php"><button class="page-button">Profile</button></a>
    <?php if(isset($_SESSION['user_id'])) {
        echo '<a href="logout.php"><button class="page-button">Logout</button></a>';
    } else {
        echo '<a href="index.php"><button class="page-button">Login</button></a>';
    }
    ?>
</div>