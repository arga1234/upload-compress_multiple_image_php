<form action="hasil.php" method="POST" enctype="multipart/form-data">
    <input multiple type="file" name="foto[]"/>
    <div class="col-md-6">
      <p>quality</p>
    <input type="number" min="1" max="100" value="50" name="quality"/>
    </div>
    <div class="col-md-6">
      <p>Width</p>
    <input type="number" min="1" max="5000" value="1280" name="width"/>
    </div>
    <input type="submit" name="proses" value="Proses"/>
</form>
