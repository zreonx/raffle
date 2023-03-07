
<?php require_once 'includes/header.php'; ?>


<form action="controller/login.php" method="post" class="mt-3 p-3">
    <?php echo (isset($_SESSION['invalid_credentials'])? $_SESSION['invalid_credentials']: ""); ?>
    <div class="row">
        <div class="col-md-4">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ""; ?>" required>
        </div>
   </div>
   <div class="row">
        <div class="col-md-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
   </div> 
    <div class="row mt-3">
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Login</button>
        </div>
    </div>

</form>

<?php require_once 'includes/footer.php'; ?>


