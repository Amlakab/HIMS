<?php
  function createHeader($icon, $heading, $sub_heading) {
    echo '
    <section class="row content-header">
      <div class="header-title col-md-11">
        <p class="h4 pt-2"><i class="fa fa-'.$icon.'"></i>&emsp;'.$heading.'</p>
        &emsp;&emsp;&emsp;<small class="font-weight-bold h6">'.$sub_heading.'</small>
      </div>
    </section>
    <hr style="border-top: 2px solid #ff5252;">
    ';
  }
?>
