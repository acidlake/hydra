<?php require_once LAYOUT . 'header.php' ?>
<div id="">
    <div class="over">

    </div>
    <div class="notfound margin">
        <div class="notfound-404">
            <h1>Invalid<?=ucwords($data[0]);?></h1>
        </div>
        <h2>Oops! <?=$data[0];?> [<?=ucwords($data[1]);?>] Could Not Be Found</h2>
        <p>Sorry but the <?=$data[0];?> you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
        <a href="<?=URLROOT;?>"><?=URLROOT;?></a>
    </div>
    <div class="notfound bg-green">
        <div class="notfound-404">
            <h1><?=$data[1];?> was not found</h1>
        </div>
        <p>Are you sure the <?=$data[0];?> exist and is a .php file?</p>
       
    </div>
</div>
<?php require_once LAYOUT . 'footer.php'; ?>