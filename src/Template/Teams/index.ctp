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
                                <?= $this->Html->link(__('View'), ['action' => 'view', $team->id], ['class' => 'btn btn-info btn-fill']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $team->id], ['class' => 'btn btn-fill']) ?>
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
<!-- always include yummy-search.js before your event listener -->
<script src="/yummy/js/yummy-search.js"></script>
<!-- jQuery is not required -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">
</script>

<script>
$(function(){
    document.addEventListener('yummySearchFieldChange', function(e){
        $(e.detail.input).show().attr('disabled',false);
        $(e.detail.input).parent().find('select').remove();

        switch(e.detail.dataType){
            /**
             * List: custom dropdown
             */
            case 'list':
                $(e.detail.input).hide().attr('disabled',true);

                var dropdown = '<select name="YummySearch[search][]" class="form-control border-input yummy-search">';
                dropdown+= '<option value=""></option>';
                for (var i=0; i<e.detail.items.length; i++) {
                    if (e.detail.prevValue === e.detail.items[ i ]){
                        dropdown+= '<option value="' + e.detail.items[ i ] + '" selected="selected">' + e.detail.items[ i ] + '</option>';
                    } else {
                        dropdown+= '<option value="' + e.detail.items[ i ] + '">' + e.detail.items[ i ] + '</option>';
                    }
                }
                dropdown+= '</select>';
                $(e.detail.input).parent().append(dropdown);

                if (e.detail.prevOperator !== null) {
                    $(e.detail.operator).val(e.detail.prevOperator);
                } else {
                    $(e.detail.operator).val('eq');
                }

                break;
            default:
                $(e.detail.operator).find('option').attr('disabled',false);
        }
    }, false);

    /**
     * Initiate event dispatchers for elements created from previous search
     */
    YummySearch.load();
})
</script>