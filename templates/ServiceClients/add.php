<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceClient $serviceClient
 */
?>
<div class="row">
    <?= $this->Form->create($serviceClient) ?>
    <div class="card text-center">
        <div class="card-header">
            <legend><?= __('Add Service Client') ?></legend>
        </div>
        <div class="card-body">
            <?php
            echo $this->Form->control('user_id',['options'=> $arr_serviceClient,'class'=>'form-control']);
            echo $this->Form->control('first_name',['class'=>'form-control','maxlength'=>20,'type' => 'text']);
            echo $this->Form->control('last_name',['class'=>'form-control','maxlength'=>20]);
            echo $this->Form->control('phone_no',['class'=>'form-control','type' => 'number','min'=> 0,'Maxlength'=>10]);
            echo $this->Form->control('notes',['class'=>'form-control','Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please email us. Our Email: info@48.com."]);
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
