<?php foreach ($results as $row): ?>
<div>
    <h3><?= $row->title ?></h3>
    <p class='notice'><?= $row->body ?></p>
</div>
<?php endforeach; ?>