<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    .error{font-size: 25px !important;color: #ff0000;}
    .form-control .form-error{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box;border:1px solid #d1d3e2;border-radius:.35rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
    .form-control,.form-error{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box;border:1px solid #d1d3e2;border-radius:.35rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
</style>
<div class="row">
    <?= $this->Form->create($user,['style'=>'width:35%'])?>
    <div  class="card text-center">
        <div class="card-header">
            <legend><?= __('Add User') ?></legend>
        </div>
        <div class="card-body">
            <?php

            $options = array('Staff' => 'Staff','Inspector' => 'Inspector', 'Client' => 'Client','Subcontractor'=>'Subcontractor');
            echo $this->Form->control('role', ['class'=>'form-control','options'=>$options]);
            echo $this->Form->control('email',['class'=>'form-control']);
            echo $this->Form->control('password',['class'=>'form-control']);
            echo $this->Form->control('confirm_password',['type'=>'password','class'=>'form-control']);
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
