<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Say some words | Hilih';
?>
<div class="site-index">

    <h1>I wanna say...</h1>
    
    <div class="body-content">
    	<?php
    		$form = ActiveForm::begin()?>
        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?= $form->field($posting, 'name');?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($posting, 'age');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
                    <?php $items = ['Jakarta'=>'Jakarta', 'Surabaya'=>'Surabaya', 'Bogor'=>'Bogor', 'Medan'=>'Medan', 'Yogyakarta'=>'Yogyakarta', 'Padang'=>'Padang', 'Pontianak'=>'Pontianak', 'Bali'=>'Bali', 'Makassar'=>'Makassar', 'Jayapura'=>'Jayapura']; ?>
            		<?= $form->field($posting, 'city')->dropDownList($items, ['prompt' => 'Choose City...']);?>
            	</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
            	<div class="col-lg-6">
            		<?php $items = ['Male'=>'Male', 'Female'=>'Female', 'Rather not to say'=>'Rather not to say']; ?>
            		<?= $form->field($posting, 'sex')->dropDownList($items, ['prompt' => 'Choose Sex...']);?>
            	</div>
            </div>
        </div>

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
            			<?= Html::submitButton('Create Postingan', ['class'=>'btn btn-primary']);?>
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
