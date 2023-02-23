<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>
<div class="row">
    <?= $this->Form->create($report) ?>
    <div class="card text-center">
        <div class="card-header">
            <legend><?= __('Edit Report') ?></legend>
        </div>
        <div class="card-body">
            <?php
            echo $this->Form->control('job_id', ['options' => $jobs,'class'=>'form-control']);
            echo $this->Form->control('body',['class'=>'form-control','style'=>'height:350px','Maxlength'=>3000,'placeholder'=>"The max word is 3000."]);
            ?>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button('Submit',['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $report->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $report->report_name), 'class' => 'btn btn-outline-danger', 'type' =>'button']
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
