<style>
table tr a {
  color:#fff;
}
</style>
<?php
global $base_url;
global $user;

$color='';
$number = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32');

?>

<table class="table table-hover table-bordered table-dark">
  <thead>
    <tr>
        <?php if(!empty($rows[0]['value_1'])){ ?>
        <th scope="col">Year</th>
        <?php } ?>

        <?php if(!empty($rows[0]['value_2'])){ ?>
        <th scope="col">Class</th>
        <?php } ?>

        <?php if(!empty($rows[0]['value_3'])){ ?>
        <th scope="col">Term</th>
        <?php } ?>

        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($rows as $row){
      $result_subset = array_slice($row,-10,8);
      $diff = array_intersect($number, $result_subset);
      if(!empty($diff)){
        $color='#ff0000e6';
      }
      else if(in_array('pending',$row)){
        $color="#b0b020";
      }
      else if(in_array('absent',$row)){
        $color="#f009";
      }else{
        $color="green";
      }
    ?>
    <tr style="background:<?= $color; ?>">
      <?php if(!empty($row['value_1'])){ ?>
      <td scope="row">
        <?php print $row['value_1']; ?>
      </td>
      <?php } ?>

      <?php if(!empty($row['value_2'])){ ?>
      <td><?= ucwords(str_replace("_", ' ', $row['value_2'])); ?></td>
      <?php } ?>

      <?php if(!empty($row['value_3'])){ ?>
      <td><?= ucwords(str_replace("_", ' ', $row['value_3'])); ?></td>
      <?php } ?>

      <td>
        <a href="<?php echo $base_url.'/resultpdf/'.$row['sid'].'/'.$row['value']; ?>">View Result</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
