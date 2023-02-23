<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <?= $this->Form->create($user) ?>
    <div class="card text-center">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <?php
            echo $this->Form->control('email',['class'=>'form-control','Maxlength'=>50]);
            echo $this->Form->control('password',['type'=>'password','class'=>'form-control','value'=>'']);
            echo $this->Form->control('confirm_password',['type'=>'password','class'=>'form-control']);
            ?>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button('Submit',['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
            <?= $this->Form->postLink(
                __('Delete',['class'=>'btn btn-outline-primary']),
                ['action' => 'delete', $user->id,],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->email), 'class' => 'btn btn-outline-danger', 'type' =>'button']
            ) ?>
        </div>

    </div>
</div>
<br>
<?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>

<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
        $(this).find("button[type='Delete']").prop('disabled',true);
    });
</script>

