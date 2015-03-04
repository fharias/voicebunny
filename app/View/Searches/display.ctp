<div class="jumbotron">
    <h1>About Love</h1>
    <p><?php echo $phrase->quote ?></p>
    <?php echo $this->Form->create(null, array('action'=>'add', 'method'=>'post'))?>
    <div class="input-group">
        <?php echo $this->Form->input('title', array('class'=>'form-control','label'=>false, 'required'=>'true', 'placeholder'=>'Set title for project'))?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Create new Speedy project</button>
        </span>
    </div><!-- /input-group -->
    <?php echo $this->Form->hidden('description', array('value'=>$phrase->quote))?>
    <?php echo $this->Form->end()?>
</div>