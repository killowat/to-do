<?php if($currentTasks): ?>
    <?php foreach ($currentTasks as $row): ?>
        <?php
        $list_class = '';
        $text_class = '';
        ?>
        <li class="to-do-list_circle <?=$list_class?>"><div class="to-do-list_item">
                <div class="to-do-list_marker"></div>
                <div class='to-do-list_task <?=$text_class?>' id="<?=$row['id']?>"><?=$row['task']?></div>
                <a href='delete?id=<?=$row['id']?>' class="to-do-list_delete">&times;</a>
            </div></li>
    <?php endforeach;?>
<?php endif?>
<?php if($doneTasks): ?>
    <?php foreach ($doneTasks as $row): ?>
        <?php
        $list_class = 'to-do-list_checkmark';
        $text_class = 'to-do-list_done';
        ?>
        <li class="to-do-list_circle <?=$list_class?>">
            <div class="to-do-list_marker"></div>
            <div class="to-do-list_item">
                <div class='to-do-list_task <?=$text_class?>' id="<?=$row['id']?>"><?=$row['task']?></div>
                <a href='delete?id=<?=$row['id']?>' class="to-do-list_delete">&times;</a>
            </div></li>
    <?php endforeach;?>
<?php endif?>
<div class="hidden">
