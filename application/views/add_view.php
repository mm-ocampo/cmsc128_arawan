	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

	<?php
		$this->load->view('includes/header');
	?>
		<?php echo validation_errors('<p class="error">'); ?>
		<?php echo form_open("material/add"); ?>
		Accession Number: <input type="text" name="accession_number" value="<?php echo set_value('accession_number'); ?>" /><br/>
		Title: <input type="text" name="title" value="<?php echo set_value('title'); ?>" /><br/>
		Author: <input type="text" name="author" value="<?php echo set_value('author'); ?>" /><br/>
		Copyright Year: <input type="number" name="copyright_year" min="1900" max="2014" value="<?php echo set_value('copyright_year'); ?>" /><br/>
		Publisher: <input type="text" name="publisher" value="<?php echo set_value('publisher'); ?>" /><br/>
		Type: <input type="text" name="type" value="<?php echo set_value('type'); ?>" /><br/>
		<input type="submit" value="Add Reading Material" />
		</p>
		<?php echo form_close(); ?>		

	<?php
		$this->load->view('includes/footer');
	?>