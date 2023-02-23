<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <?= $this->Form->create($project) ?>
    <div class="card text-center">
        <div class="card-header">
            Edit Project
        </div>
        <div class="card-body">
            <?php
            $status =array(0 => 'Pending', 1 => 'Ongoing',2 => 'Completed');
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
                echo $this->Form->control('property_id', ['options' => $properties,'class'=>'form-control']);
                echo $this->Form->control('subcontractor_id', ['class'=>'form-control','options' => $subcontractors]);
                echo $this->Form->control('expected_completion_date',['class'=>'form-control']);
                echo $this->Form->control('status', ['class'=>'form-control','options'=>$status]);
                echo $this->Form->control('description',['class'=>'form-control','Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please Email us. Our Email: info@48.com."]);
            }else{
                echo $this->Form->control('property_id', ['options' => $properties,'class'=>'form-control','readonly'=>true]);
                echo $this->Form->control('subcontractor_id', ['class'=>'form-control','options' => $subcontractors,'readonly'=>true]);
                echo $this->Form->control('expected_completion_date',['class'=>'form-control','readonly'=>true]);
                echo $this->Form->control('status', ['class'=>'form-control','options'=>$status]);
                echo $this->Form->control('description',['class'=>'form-control','readonly'=>true,'Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please Email us. Our Email: info@48.com."]);

            }
            ?>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button('Submit',['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->full_pro), 'class' => 'btn btn-outline-danger', 'type' =>'button']
            ) ?>
        </div>



    </div>
</div>
<br>



<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
        $(this).find("button[type='Delete']").prop('disabled',true);
    });
</script>

