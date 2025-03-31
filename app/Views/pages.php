<?php $pager->setSurroundCount(1); ?>

<div class="pages-wrap">
    <?php if($pager->HasPrevious()): ?>
        <button class="btn-prev" type="button" onclick="location.href='<?php echo $pager->getPrevious(); ?>'"></button>    
    <?php endif; ?>
    <!-- <button class="btn-prev"></button> -->
    <ul>
        <?php foreach($pager->links() as $link): ?>
            <li <?php echo $link['active'] ? 'class="is-active"' : '';?>>
                <a href="<?php echo $link['uri']; ?>"><?php echo $link['title']; ?></a>
            </li>
        <?php endforeach; ?>
        <!-- <li class="is-active">1</li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li> -->
    </ul>
    <?php if($pager->hasNext()): ?>
        <button class="btn-next" type="button" onclick="location.href='<?php echo $pager->getNext(); ?>'"></button>    
    <?php endif; ?>
    <!-- <button class="btn-next"></button> -->
</div>