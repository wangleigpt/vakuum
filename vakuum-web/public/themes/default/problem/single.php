<?php
/**
 *
 * @var MDL_Problem
 */
$problem = $this->problem;

$prob_id = $problem->getID();
$prob_name = $problem->getName();
$prob_title = $problem->getTitle();
$prob_contents = $problem->getContents();
$prob_info = $problem->getInfo();
$input = $prob_info['data_config']['input'];
$output = $prob_info['data_config']['output'];
$checker = $prob_info['data_config']['checker'];
$time_limit = $prob_info['data_config']['time_limit'];
$memory_limit = $prob_info['data_config']['memory_limit'];
$output_limit = $prob_info['data_config']['output_limit'];
$case_count = count($prob_info['data_config']['case']);
$judge_source_length_max = MDL_Config::getInstance()->getVar('judge_source_length_max');
if ($time_limit == 0) $time_limit = MDL_Config::getInstance()->getVar('judge_default_time_limit');
if ($memory_limit == 0) $memory_limit = MDL_Config::getInstance()->getVar('judge_default_memory_limit');
if ($output_limit == 0) $output_limit = MDL_Config::getInstance()->getVar('judge_default_output_limit');
$checker=($checker['type']=='standard')?'':'特殊检查器';
?>

<?php $this->title = $prob_title ?>
<?php $this->display('header.php') ?>

<h2><?php echo $this->escape($prob_title) ?></h2>

<table>
	<tr>
		<td>输入文件</td>
		<td>输出文件</td>
		<td>时间限制</td>
		<td>内存限制</td>
		<td>输出限制</td>
	</tr>
	<tr>
		<td><?php echo $this->escape($input) ?></td>
		<td><?php echo $this->escape($output) ?></td>
		<td><?php echo $this->escape($time_limit) ?> ms</td>
		<td><?php echo $this->escape($memory_limit) ?> kB</td>
		<td><?php echo $this->escape($output_limit) ?> kB</td>
	</tr>
</table>
<?php echo $this->escape($checker) ?>

<div id="problem_content" class="content_box">
<?php echo $prob_contents ?>
</div>

<div>
<form action="<?php echo $this->submit_url ?>" method="post" enctype="multipart/form-data" >
	<input type="file" name="source"/>
	<select name="lang">
		<option value="cpp">C++</option>
		<option value="c">C</option>
		<option value="pas">Pascal</option>
	</select>
	<input type="submit" value="提交" />
	<input name="prob_id" type="hidden" value="<?php echo $prob_id ?>" />
	<input name="prob_name" type="hidden" value="<?php echo $prob_name ?>" />
<?php if (isset($this->contest)): ?>
	<input name="contest_id" type="hidden" value="<?php echo $this->contest->getID() ?>" />
<?php endif ?>
	<input name="MAX_FILE_SIZE" type="hidden" value="<?php echo $judge_source_length_max?>" />
</form>
</div>
<?php $this->display('footer.php') ?>