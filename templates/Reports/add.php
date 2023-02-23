<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>
<div class="row">
    <?= $this->Form->create($report,['style'=>'width:55%']) ?>
    <div class="card text-center" style="height:630px">
        <div class="card-header">
            <legend><?= __('Add Report') ?></legend>
        </div>
        <div class="card-body">
            <?php
            echo $this->Form->control('job_Name', ['options' => $jobs,'class'=>'form-control']);
            echo $this->Form->control('body',['class'=>'form-control','style'=>'height:350px','Maxlength'=>3000,'placeholder'=>"The max word is 3000."]);
            ?>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
        </div>
    </div>
</div>
<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);

    });
</script>

