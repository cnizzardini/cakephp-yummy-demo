<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php
$this->start('sidebar');
?>
<li>
    <a href="/yummy-demo/teams/add">
        <i class="ti-plus"></i>
        <p>Add Team</p>
    </a>
</li>
<?php 
$this->end(); 
?>

<div class="card">
	<div class="header">
		<h4 class="title"><?= h($team->name) ?></h4>
	</div>
    <div class="content">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label><?= __('Division') ?></label><br/>
                    <?= $team->has('division') ? $this->Html->link($team->division->name, ['controller' => 'Divisions', 'action' => 'view', $team->division->id]) : '' ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label><?= __('Name') ?></label><br/>
                    <?= h($team->name) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label><?= __('Abbreviation') ?></label><br/>
                    <?= h($team->abbreviation) ?>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label><?= __('Id') ?></label><br/>
                    <?= $this->Number->format($team->id) ?>
                </div>
            </div>
        </div>
    </table>
</div>