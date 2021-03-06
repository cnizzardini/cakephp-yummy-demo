<?php 
/**
 * This is the YummySearch basic form. You can use this as a template for creating your own search form elements.
 * @example echo $this->YummySearch->basicForm(['element' => 'my-custom-yummysearch']);
 */

echo $this->Form->create(null,['class'=>'form form-custom form-medium','id'=>'yummy-search-form','role'=>'form','type'=>'get']); 

$i = 0;
$length = isset($YummySearch['rows']['field']) ? count($YummySearch['rows']['field']) : 0;
?>
<div class="row">
    <div class="col-md-2">
            <label for="">Search by</label>
    </div>
</div>
<?php
do{
    $column = isset($YummySearch['rows']['field'][ $i ]) ? $YummySearch['rows']['field'][ $i ] : '';
    $operator = isset($YummySearch['rows']['operator'][ $i ]) ? $YummySearch['rows']['operator'][ $i ] : '';
    $search = isset($YummySearch['rows']['search'][ $i ]) ? $YummySearch['rows']['search'][ $i ] : '';
?>
<div class="row yummy-search-row">
    <div class="col-lg-2 col-md-1 col-xs-6">
        <div class="input text">
            <?php 
                echo $this->Form->select('YummySearch.field[]',  $YummySearch['models'], [
                    'class' => 'form-control border-input',
                    'label' => false,
                    'escape' => false,
                    'default' => $column
                ]); 
            ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-1 col-xs-6">
        <div class="input text">
            <?php
                echo $this->Form->select('YummySearch.operator[]', $YummySearch['operators'],[
                    'class' => 'form-control border-input operator',
                    'label' => false,
                    'escape' => false,
                    'default' => $operator
                ]); 
            ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-xs-9">
        <div class="input text">
            <?php
                echo $this->Form->input('YummySearch.search[]',[
                    'class' => 'form-control border-input',
                    'placeholder' => 'Search',
                    'label' => false,
                    'default' => $search
                ]); 
            ?>
        </div>
    </div>
    <div class="col-lg-1 col-md-2 col-xs-3">
        <div class="input text">
        <?php 
        echo $this->Form->button('&#10133;', [
            'type' => 'button', 
            'class' => 'btn btn-info plus-button', 
            'style' => $i >= 1 ? 'display:none':''
        ]); 
        echo $this->Form->button('&#10134;', [
            'type' => 'button', 
            'class' => 'btn btn-info minus-button', 
            'style' => $i == 0 ? 'display:none':''
        ]); ?>
        </div>
    </div>
</div>
<?php 
    $i++;
}
while($i < $length);
?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <?php echo $this->Form->button('Search', ['class' => 'btn btn-info btn-fill', 'value' => 1]); ?>
        <?php echo $this->Html->link('Clear', $YummySearch['base_url'], ['class' => 'btn btn-info']); ?>
    </div>
</div>
<?php echo $this->Form->end();
