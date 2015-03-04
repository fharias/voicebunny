
<?php foreach ($project->projects as $p) :
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">Voicebunny Project</div>
        <div class="panel-body">
            <h1><?php echo $p->title ?></h1>
            <p><?php echo $p->script->part001 ?></p>   
            <?php foreach ($p->reads as $r): ?>
                <p>
                    <span>Status: <b><?php echo $r->status ?></b></span>
                </p>
                <p>
                    <audio controls>
                        <source src="<?php echo $r->urls->part001->default ?>" type="audio/mpeg" />
                        <a href="<?php echo $r->urls->part001->default ?>"><?php echo $p->title?></a>
                    </audio>
                </p>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>