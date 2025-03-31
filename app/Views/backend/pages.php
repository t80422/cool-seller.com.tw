<?php $pager->setSurroundCount(1); ?>

<div class="pages-wrap">
    <?php if ($pager->HasPrevious()): ?>
        <button class="btn-prev" type="button" onclick="location.href='<?php echo $pager->getPrevious(); ?>'"></button>
    <?php endif; ?>
    <ul>
        <?php foreach ($pager->links() as $link): ?>
            <li <?php echo $link['active'] ? 'class="is-active"' : ''; ?>>
                <a href="<?php echo $link['uri']; ?>"><?php echo $link['title']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if ($pager->hasNext()): ?>
        <button class="btn-next" type="button" onclick="location.href='<?php echo $pager->getNext(); ?>'"></button>
    <?php endif; ?>
</div>