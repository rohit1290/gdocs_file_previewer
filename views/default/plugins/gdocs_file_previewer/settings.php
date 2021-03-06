<?php

$pdf_setting = $vars['entity']->pdf;
$wordc_setting = $vars['entity']->wordc;
$power_setting = $vars['entity']->power;
$excel_setting = $vars['entity']->excel;
$pages_setting = $vars['entity']->ipages;
$zip_setting = $vars['entity']->zip;
$eps_setting = $vars['entity']->eps;

?>

<p>
  <b>Do you want to preview PDF files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[pdf]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $pdf_setting]);

?>
</p>

<p>
  <b>Do you want to preview MS Word files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[wordc]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $wordc_setting]);

?>
</p>

<p>
  <b>Do you want to preview MS Powerpoint files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[power]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $power_setting]);

?>
</p>

<p>
  <b>Do you want to preview MS Excel files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[excel]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $excel_setting]);

?>
</p>

<p>
  <b>Do you want to preview Apple iWork Pages files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[ipages]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $pages_setting]);

?>
</p>

<p>
  <b>Do you want to preview Zip files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[zip]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $zip_setting]);

?>
</p>

<p>
  <b>Do you want to preview Postscript EPS files?</b>

<?php

echo elgg_view('input/dropdown', [
'name' => 'params[eps]',
'options_values'=> ['1'=>'Yes','2'=>'No'],
'value'=> $eps_setting]);

?>
</p>

<p>
	<b>File download url timeout</b>
<?php
	echo elgg_view('input/text', [
		'name' => 'params[timeout]',
		'value' => $vars['entity']->timeout ? $vars['entity']->timeout : 180
	]);
?>
	<div class="elgg-subtext">
		Enter a value in the number of seconds the link should be active after generation.  Default is 180 = 3 minutes
	</div>
</p>