<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Tags you have
            </header>
            <div class="panel-body">
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $search): ?>
                                <tr>
                                    <td><?php echo $search['Search']['id'] ?></td>
                                    <td><?php echo $search['Search']['title'] ?></td>
                                    <td><?php echo $search['Search']['description']
                                        ?></td>
                                    <td><?php
                                            echo $this->Html->link('<li class="fa fa-edit"></li>&nbsp;' . 'View', '/searches/view/' . $search['Search']['id'], array('escape' => false));
                                         ?> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </div>
</div>