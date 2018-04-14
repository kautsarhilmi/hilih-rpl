<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Change words | Hilih';
?>
<div class="site-index">

    <h1>Change my words</h1>
    
    <div class="body-content">
    	<?php
    		$form = ActiveForm::begin()?>

         <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($posting, 'words');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<div class="col-lg-3">
            			<?= Html::submitButton('Update words', ['class'=>'btn btn-primary']);?>
            		</div>
            		<div class="col-lg-2">
            			<a href=<?php echo yii::$app->homeUrl;?> class=" btn btn-primary">Back</a>
            		</div>
            	</div>
            </div>
        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>
