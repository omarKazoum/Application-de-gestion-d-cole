<?php 
use \utils\Constants;
use \utils\InputValidator;
?>
<h3 class="mt-2">
    <?= isset($edit)?'Edit': 'Add class' ?>

</h3>
<link rel="stylesheet" href="<?= css('validator.css') ?>">
<form action="<?= isset($edit)?getUrlFor('classes/edit'):getUrlFor('classes/add') ?>" method="post"
      class="activate-validation"
>
    <input type="hidden"  name='<?= Constants::Classes_Col_Id?>' value="<?= isset($edit)? $editClass->id:''?>">
    <div class="form-group">
        <label for="<?=Constants::Classes_Col_Name?>" class="form-label">Class name*</label>
        <input
                value="<?= isset($edit)? $editClass->name:$_POST[Constants::Classes_Col_Name]??'' ?>"
                id="<?=Constants::Classes_Col_Name?>"
                type="text"
                class="form-control"
                data-validate="1"
                data-validate-pattern="^\w{3,50}"
                data-validate-message="Class name can be a word containing between 3 and 50 characters"
                placeholder="Youga class"
                name="<?=Constants::Classes_Col_Name?>">
    </div>
    <div class="form-group">
        <label for="<?=Constants::Classes_Col_Description?>" class="form-label">Class description(optional)</label>
        <input
                value="<?= isset($edit)?$editClass->description:$_POST[Constants::Classes_Col_Description]??'' ?>"
                id="<?=Constants::Classes_Col_Description?>"
                type="text"
                class="form-control"
                data-validate="1"
                data-validate-pattern="^\w{0,200}"
                data-validate-message="Class name can be a word containing between 0 and 200 characters"
                placeholder="it's a fantastic class to refresh your positive energy"
                name="<?=Constants::Classes_Col_Description?>">
    </div>
    <button type="submit" class="mt-2 btn btn-primary">save</button>
</form>
<script src="<?= js('validator.js') ?>"></script>

<script>
    <?php if(InputValidator::error(Constants::Classes_Col_Name)){?>
        enableErrorOn(document.getElementsByName('<?= Constants::Classes_Col_Name?>')[0],true,
            <?= InputValidator::error(Constants::Classes_Col_Name)?>
        )
    <?php } 
    if(InputValidator::error(Constants::Classes_Col_Description)){?>
    enableErrorOn(document.getElementsByName('<?= Constants::Classes_Col_Description?>')[0],true,
        <?= InputValidator::error(Constants::Classes_Col_Description)?>
    )
    <?php } ?>

</script>
