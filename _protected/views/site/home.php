<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Hilih';
?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')):?>
	<div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <?php echo yii::$app->session->getFlash('message');?>
	 </div>
<?php endif;?> 

    <div class="jumbotron">
        <h1 style="color:#337ab7;">Hilih</h1>

        <p class="lead">Say the words. See the world.</p>

    </div>
    <div class="row">
    	<span style="margin-bottom: 20px;"><?= Html::a('Create', ['/site/create'], ['class' => 'btn btn-primary'])?></span>
    </div>
    <div class="body-content">

        <div class="row">
            <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Age</th>
			      <th scope="col">City</th>
			      <th scope="col">Sex</th>
			      <th scope="col">Words</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php if(count($postingan) > 0):?>
			  		<?php foreach($postingan as $posting): ?>
			    <tr class="table-active">
			      <th scope="row"><?php echo $posting->name;?></th>
			      <td><?php echo $posting->age;?></td>
			      <td><?php echo $posting->city;?></td>
			      <td><?php echo $posting->sex;?></td>
			      <td><?php echo $posting->words;?></td>
			      <td>
			      	<span><?= Html::a('View', ['view', 'id' => $posting->pid], ['class' => 'label label-info']) ?></span>
			      	<span><?= Html::a('Update', ['update', 'id' => $posting->pid], ['class' => 'label label-success']) ?></span>
			      	<span><?= Html::a('Delete', ['delete', 'id' => $posting->pid], ['class' => 'label label-danger']) ?></span>
			      </td>
			    </tr>
					<?php endforeach; ?>
			    <?php else: ?>
			    	<tr>
			    		<td>No Records Found!</td>
			    	</tr>
			    <?php endif; ?>
			  </tbody>
			</table> 
        </div>

    </div>
</div>
