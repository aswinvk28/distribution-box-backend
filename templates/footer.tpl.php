<div class="clearfix">
    <div class="pull-right">
        
    </div>
</div>
<?php

$stringfromfile = file('.git/HEAD', FILE_USE_INCLUDE_PATH);

$firstLine = $stringfromfile[0]; //get the string from the array

$explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string

$branchname = $explodedstring[2]; //get the one that is always the branch name

echo "<div class='container' style='clear: both; font-size: 14px; position: fixed; bottom: 0px; font-family: Helvetica; color: #fff; background: #000; padding: 20px; text-align: center;'>Current branch: <span style='color:#fff; font-weight: bold; text-transform: uppercase;'>" . $branchname . "</span></div>"; //show it on the page

?>
<?php $context = get_page_context(); ?>
<script type="text/javascript">
    var route = "<?php echo json_encode($context, JSON_HEX_QUOT); ?>";
</script>