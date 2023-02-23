<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="enquiries form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('New Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('full_name', ['label' => 'Your Full name']);
                    echo $this->Form->control('email', ['label' => 'Your Email address']);
                    echo $this->Form->control('subject', ['label' => 'Subject']);
                    echo $this->Form->control('body', ['label' => 'Your Enquiry']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
