<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $alternative->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $alternative->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Alternatives'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alternatives form large-9 medium-8 columns content">
    <?= $this->Form->create($alternative) ?>
    <fieldset>
        <legend><?= __('Edit Alternative') ?></legend>
        <?php
            echo $this->Form->control('content');
            echo $this->Form->control('question_id', ['options' => $questions]);
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
