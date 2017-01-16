<?php

?>
<meta http-equiv="refresh" content="2;url=<?php echo Yii::app()->homeUrl; ?>" />

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
			 <center>
                            <h1>
                                HYVÄ! JONOSSA EI OLE YHTÄÄN KERÄILYÄ. SINUT SIIRRETÄÄN TAIKAISIN ETUSIVULLE. <br>
				JOS MITÄÄN EI TAPAHDU, PAINA "TAKAISIN" NAPPIA.
                            </h1>
			 </center>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->
 </div>
</div>

<br>

<div class="row">
 <div class="col-sm-4 col-sm-offset-4">
  <?php echo CHtml::link('Takaisin', Yii::app()->request->baseUrl.'/index.php/site/index', array('class'=>'btn btn-lg btn-default btn-block')); ?>
 </div>
</div>







