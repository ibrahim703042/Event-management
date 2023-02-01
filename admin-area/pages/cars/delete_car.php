<form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_voiture" value="<?php echo $_GET['delete_id']; ?>" />
      <button type="submit" class="btn btn-danger" name="car_delete_btn">
            OUI
      </button>
      <a href="dashboard.php?page=pages/cars/index" class="btn  btn-info text-white">
            NON
      </a>
</form> 