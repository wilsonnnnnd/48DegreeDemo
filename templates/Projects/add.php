<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <?= $this->Form->create($project,['style'=>'width:55%']) ?>
    <div class="card text-center">
        <div class="card-header">
            <legend><?= __('Add Project') ?></legend>
        </div>
        <div class="card-body">
            <?php
//            $status =array('Pending' => 'Pending', 'Ongoing' => 'Ongoing','Completed'=>'Completed');
            $status =array('0' => 'Pending', '1' => 'Ongoing','2'=>'Completed');
            echo $this->Form->control('property_id', ['options' => $properties,'class'=>'form-control']);
            echo $this->Form->control('subcontractor_id', ['options' => $subcontractors,'class'=>'form-control']);
            echo $this->Form->control('expected_completion_date',['class'=>'form-control']);
            echo $this->Form->control('status', ['class'=>'form-control','options'=>$status]);
            echo $this->Form->control('description', ['class'=>'form-control','Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please Email us. Our Email: info@48.com."]);
            ?>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
        </div>

    </div>
</div>
<br>


<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
    });
</script>

