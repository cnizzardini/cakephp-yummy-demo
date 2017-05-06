<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', 'Team');
$this->start('sidebar');
//echo $this->element('Navigation/Team.ctp');
$this->end(); 
?>
<div class="card">
	<div class="header">
		<h4 class="title">Team</h4>
	</div>
	<div class="content">
    <?php echo $this->Form->create($team,['class'=>'form form-custom form-medium','role'=>'form']); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    
                <div class="form-group">
                    <?php echo $this->Form->control('division_id', [
                        'class'=>'form-control border-input',
                        'options' => $divisions
                ]); ?>
                </div>
                    
                <div class="form-group">
                    <?php echo $this->Form->control('name',[
                        'class'=>'form-control border-input',
                        'placeholder'=>'name'
                    ]); ?>
                </div>
                    
                <div class="form-group">
                    <?php echo $this->Form->control('abbreviation',[
                        'class'=>'form-control border-input',
                        'placeholder'=>'abbreviation'
                    ]); ?>
                </div>
          
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                    <?php echo $this->Form->button(__('Submit'),['class'=>'btn btn-info btn-fill btn-wd']) ?>
                </div>
            </div>
        </div>
    <?php echo $this->Form->end() ?>
    </div>
</div>
