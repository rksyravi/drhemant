<style>
  @CHARSET "UTF-8";
  .page-break {
    page-break-after: always;
    page-break-inside: avoid;
    clear:both;
  }
  .page-break-before {
    page-break-before: always;
    page-break-inside: avoid;
    clear:both;
  }

  p span{
    color: #000;
    font-weight: bold;
  }
  .result-bold{
    text-align:center;
  }
  .result-bold p{
    color:#000;
  }
  .result-bold .display-block {
    text-align: center;
    font-weight: bold;
    font-size: 28px;
    font-style: italic;
    border-bottom: 1px solid;
    display: inline;
  }
  .result-content{
    padding:30px;
  }
  .result-content span{
    color:#000;
    font-weight:bold;
  }
  .gen-pdf{
    float:right;
  }

</style>

<?php

global $base_url;
global $user;

$counter = 1;
$result_subset = array_slice($rows[0],-8,10);

$number = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32');
$diff = array_intersect($number, $result_subset);

if(!empty($diff)){
  $color='#ff0000e6';
}
else if(in_array('pending',$rows[0])){
  $color="#b0b020";
}
else if(in_array('absent',$rows[0])){
  $color="#f009";
}else{
  $color="green";
}

$list  = array('zero','one','two','three','four','five','six','seven','eight','nine');
$role_assign = array('administrator', 'students', 'parents');
$role_find = !empty(array_intersect($role_assign, $user->roles));

if(!empty(arg(3))){
  echo '<p>No Data found...</p>';
  return FALSE;
}

if(user_is_logged_in() && $role_find){
  $enroll = arg(2);
  $profile = profile2_load_by_user($user->uid);
  $profile_arr = $profile['main']->field_enroll_number['und'][0]['value'];
  $profile_arr = explode(',',$profile_arr);

  if(in_array('parents', $user->roles)){
    $query = db_select('field_data_field_enroll_number', 'enr');
    $query->join('profile', 'pf', 'enr.entity_id = pf.pid');
    $query->fields('pf', array('uid'))->condition('enr.field_enroll_number_value', $enroll, '=');
    $result = $query->execute()->fetchField();
    $profile = profile2_load_by_user($result);
  }
  if(!in_array($enroll, $profile_arr)){
    echo '<p>No Results found...</p>';
    return FALSE;
  }
  $name = ucwords($profile['main']->field_name['und'][0]['value']);
  $fname = ucwords($profile['main']->field_father_s_name['und'][0]['value']);
  $mname = ucwords($profile['main']->field_mother_s_name['und'][0]['value']);
}else {
  echo '<p>No Results found...</p>';
  return FALSE;
}
?>

<div id="main-html-2-pdfwrapper">
  <div class="row"><button onclick="generate()" class="gen-pdf">Download Result</button></div>
  <div id="html-2-pdfwrapper" class="table-responsive">
    <p>Reg. cum Roll No: <span><?= $rows[0]['value_2']; ?></span></p>
    <p>Name of the College/Institute: <span>MPS Vidhya Mandir</span></p>
    <div class="result-bold">
      <p class="display-block">Result cum Detailed Marks Card</p>
      <p><?= ucwords(str_replace("_", ' ', $rows[0]['value_3'])).', '.ucwords(str_replace("_", ' ', $rows[0]['value_1'])).', '.date('M-Y', strtotime($rows[0]['value'])); ?></p>
    </div>
    <div class="result-content">
      <div class="col-md-3">Name</div>
      <div class="col-md-9">: <span><?= $name; ?></span></div>

      <div class="col-md-3">Father's Name</div>
      <div class="col-md-9">: <span><?= $fname; ?></span></div>

      <div class="col-md-3">Mother's Name</div>
      <div class="col-md-9">: <span><?= $mname; ?></span></div>

      <table class="table table-hover table-bordered">
        <thead>
        <tr>
          <th>Subject</th>
          <th>Marks Obt.</th>
          <th>Min. Pass Marks</th>
          <th>Max. Marks</th>
        </tr>
        </thead>
        <tbody style="background:<?= $color; ?>">
          <?php if(!empty($rows[0]['value_4'])){ ?>
          <tr>
            <td>Hindi</td>
            <td><?= $rows[0]['value_4']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent=100;} ?>
          <?php if(!empty($rows[0]['value_5'])){ ?>
          <tr>
            <td>English</td>
            <td><?= $rows[0]['value_5']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100; } ?>
          <?php if(!empty($rows[0]['value_6'])){ ?>
          <tr>
            <td>Mathematics</td>
            <td><?= $rows[0]['value_6']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100; } ?>
          <?php if(!empty($rows[0]['value_7'])){ ?>
          <tr>
            <td>Science</td>
            <td><?= $rows[0]['value_7']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100; } ?>
          <?php if(!empty($rows[0]['value_8'])){ ?>
          <tr>
            <td>Social Studies</td>
            <td><?= $rows[0]['value_8']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100; } ?>
          <?php if(!empty($rows[0]['value_9'])){ ?>
          <tr>
            <td>Sanskrit</td>
            <td><?= $rows[0]['value_9']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100; } ?>
          <?php if(!empty($rows[0]['value_10'])){ ?>
          <tr>
            <td>Computer</td>
            <td><?= $rows[0]['value_10']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100;} ?>
          <?php if(!empty($rows[0]['value_11'])){ ?>
          <tr>
            <td>Drawing</td>
            <td><?= $rows[0]['value_11']; ?></td>
            <td>33</td>
            <td>100</td>
          </tr>
          <?php $percent+=100;}

          $total = $rows[0]['value_4']+$rows[0]['value_5']+$rows[0]['value_6']+$rows[0]['value_7']+$rows[0]['value_8']+$rows[0]['value_9']+$rows[0]['value_10']+$rows[0]['value_11'];
          $percentage = round($total*100/$percent, 2);

          $total_arr = str_split($total);
          $words='';
          foreach($total_arr as $total_arr){
            $words .= $list[$total_arr].' ';
          }

          if(in_array('pending', $rows[0])){
            $res = 'Pending';
          }elseif(in_array('absent', $rows[0])){
            $res = 'Absent';
          }
          else if($percentage < 33 || !empty($diff)){
            $res = 'Fail';
          }else{
            $res = 'Pass';
          }
          ?>
          <tr>
            <td>TOTAL</td>
            <td style="border-right:0px;text-align: end;"><?= $total; ?></td>
            <td style="border-left:0px;"></td>
            <td><?= $percent; ?></td>
          </tr>
          <tr>
            <td >Percentage</td>
            <td style="border-right:0px;"></td>
            <td style="border-left:0px;border-right:0px;"><?= $percentage; ?>%</td>
            <td style="border-left:0px;"></td>
          </tr>
        </tbody>
      </table>
      <p>Total Marks Obtained (In Words) : <span><?= strtoupper($words); ?> ONLY</span></p>
      <p>Result Status : <span><?= $res; ?></span></p>
    </div>
  </div>
</div>

<script src="<?php echo $base_url; ?>/sites/all/themes/drhemant/js/jspdf.min.js"></script>
<script>
  var base64Img = null;
  imgToBase64('octocat.jpg', function(base64) {
    base64Img = base64;
  });

  margins = {
    top: 70,
    bottom: 40,
    left: 30,
    width: 550
  };

  generate = function() {
    var pdf = new jsPDF('p', 'pt', 'a4');
    pdf.setFontSize(18);
    pdf.fromHTML(document.getElementById('html-2-pdfwrapper'),
      margins.left, // x coord
      margins.top,
      {
        // y coord
        width: margins.width// max width of content on PDF
      },function(dispose) {
        headerFooterFormatting(pdf, pdf.internal.getNumberOfPages());
      },
      margins);
    pdf.save('results.pdf');

    /* var iframe = document.createElement('iframe');
      iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
      document.body.appendChild(iframe);

      iframe.src = pdf.output('datauristring'); */
  };
  function headerFooterFormatting(doc, totalPages){
    for(var i = totalPages; i >= 1; i--){
      doc.setPage(i);
      //header
      header(doc);

      footer(doc, i, totalPages);
      doc.page++;
    }
  };

  function header(doc){
    doc.setFontSize(30);
    doc.setTextColor(40);
    doc.setFontStyle('normal');

    /* if (base64Img) {
        doc.addImage(base64Img, 'JPEG', margins.left, 10, 40,40);
    } */

    doc.text("", margins.left + 50, 40 );
    doc.setLineCap(2);
    //doc.line(3, 70, margins.width + 43,70); // horizontal line
  };

  function imgToBase64(url, callback, imgVariable) {
    if (!window.FileReader) {
      callback(null);
      return;
    }
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'blob';
    xhr.onload = function() {
      var reader = new FileReader();
      reader.onloadend = function() {
        imgVariable = reader.result.replace('text/xml', 'image/jpeg');
        callback(imgVariable);
      };
      reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.send();
  };

  function footer(doc, pageNumber, totalPages){
    var str = "Page " + pageNumber + " of " + totalPages
    doc.setFontSize(10);
    doc.text(str, margins.left, doc.internal.pageSize.height - 20);
  };

</script>
