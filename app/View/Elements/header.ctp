
  <div class="header">
    <div class="logo"><a href="<?=FULL_BASE_URL?>">
    	<!--<img src="<?=FULL_BASE_URL?>/images/logo.gif" width="288" height="55" border="0" alt="logo" />-->
    	<h1>Logo</h1>
    </a></div>
    <div class="search">
      <form id="form_search" name="form_search" method="post" action="">
        <label> <span>
          <input name="search_q" type="text" class="text" id="search_q" value="search" />
          </span>
          <input type="image" name="search_b" id="search_b" src="<?=FULL_BASE_URL?>/images/search_but.gif" class="button" />
        </label>
      </form>
    </div>
    <?php echo $this->element('nav'); ?>
    <div class="clr"></div>
  </div>