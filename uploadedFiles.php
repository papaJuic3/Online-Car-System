<?php include_once 'header.php'; ?>
<style>
.file-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin: 0 -10px;
}

.file {
  width: 200px;
  height: 260px;
  margin: 10px;
  border: 1px solid #eee;
  border-radius: 5px;
  padding: 10px;
  text-align: center;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  transition: box-shadow 0.2s ease-in-out;
}

.file:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.file a {
  display: block;
  text-decoration: none;
  color: #333;
  font-size: 18px;
  margin-top: 10px;
}

.file img {
  max-width: 100%;
  max-height: 100%;
  margin-bottom: 10px;
  border-radius: 5px;
}
</style>

<div class="file-list">
<?php
$uploads_dir = 'uploads/';
$file_list = scandir($uploads_dir);
foreach ($file_list as $file) {
  if ($file == '.' || $file == '..' || substr($file, 0, 1) == '.') {
    continue;
  }
  echo '<div class="file">';
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
    echo '<img src="' . $uploads_dir . $file . '">';
  } else {
    echo '<div class="file-icon"></div>';
  }
  echo '<a href="' . $uploads_dir . $file . '">' . $file . '</a>';
  echo '</div>';
}
?>
</div>
