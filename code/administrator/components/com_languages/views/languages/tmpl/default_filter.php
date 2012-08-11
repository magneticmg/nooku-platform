<div class="scopebar">
    <ul>
        <li class="<?= is_null($state->published) ? 'active' : '' ?>">
            <a href="<?= @route('published=') ?>">
                <?= @text('All') ?>
            </a>
        </li>
        <li class="<?= $state->published === true ? 'active' : '' ?>">
            <a href="<?= @route($state->published === true ? 'published=' : 'published=1' ) ?>">
                <?= @text('Published') ?>
            </a>
        </li>
        <li class="<?= $state->published === false ? 'active' : '' ?>">
            <a href="<?= @route($state->published === false ? 'published=' : 'published=0' ) ?>">
                <?= @text('Unpublished') ?>
            </a>
        </li>
    </ul>
    <div class="form-search">
        <?= @helper('grid.search', array('placeholder' => @text('Name'))) ?>
    </div>
</div>