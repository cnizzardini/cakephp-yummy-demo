<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->start('sidebar');
?>
<li>
    <a href="teams/add">
        <i class="ti-plus"></i>
        <p>Add Team</p>
    </a>
</li>
<?php 
$this->end(); 
?>
<div class="teams row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title"><?= __('Teams') ?></h4>
				<p class="category"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}} &#8211 displaying {{current}} out of {{count}} records')]) ?></p>
                <?php
                    $this->helpers()->load('Yummy.YummySearch');
                    echo $this->YummySearch->basicForm();
                ?>
			</div>
			<div class="content table-responsive table-full-width">
                <table class="table table-striped" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('conference_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('division_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('abbreviation') ?></th>
                            <th scope="col" class="actions">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teams as $team): ?>
                        <tr>
                            <td><?= h($team->name) ?></td>
                            <td><?= $team->division->conference->name ?></td>
                            <td><?= $team->division->name ?></td>
                            <td><?= h($team->abbreviation) ?></td>
                            <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $team->id], ['class' => 'btn btn-info btn-block btn-fill']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
    </div>
</div>
<script src="/yummy/js/yummy-search.js"></script>