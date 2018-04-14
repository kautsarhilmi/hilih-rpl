<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'View Words | Hilih';
?>
<div class="site-index">

    <h1>View Words</h1>
    
    <div class="body-content">
    	<div class="list-group">
    	  <a href="#" class="list-group-item list-group-item-action active">
		  	<?php echo $posting->pid; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $posting->name; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $posting->age; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $posting->city; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $posting->sex; ?>
		  </a>
		  <a href="#" class="list-group-item list-group-item-action disabled">
		  	<?php echo $posting->words; ?>
		  </a>
		</div>

		<div class="row">
			<a href=<?php echo yii::$app->homeUrl;?> class=" btn btn-primary">Back</a>
		</div>
    </div>
</div>