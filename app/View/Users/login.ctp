<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
	<?php /*
	<label for="UserUsername">Username or Email</label>
	<input name="data[User][username]" maxlength="50" type="text" id="UserUsername" value="<?=$username?>" />
	<label for="UserPassword">Password</label>
	<input name="data[User][password]" type="password" id="UserPassword" value="<?=$password?>" />
	*/?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>