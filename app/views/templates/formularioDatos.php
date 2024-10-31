<?php ?>

<form class="p-4" method="POST" action=<?php echo $ubicacionAction ?>>
    <div class="form-group" >
        <label for="inputName">NAME</label>
        <input required type="text" class="form-control" name="inputName" <?php
        if (isset($valueName)) {
            echo 'value="' . $valueName . '"';
        }
        ?> id="inputName">
    </div>
    <div class="form-group">
        <label for="inputName">DESCRIPTION</label>
        <input required type="text" class="form-control" name="inputDescription" <?php
        if (isset($valueDescription)) {
            echo 'value="' . $valueDescription . '"';
        }
        ?> id="inputDescription">
    </div>
    <div class="form-group">
        <label for="inputName">AVATAR</label>
        <input required type="text" class="form-control" name="inputAvatar" <?php
        if (isset($valueAvatar)) {
            echo 'value="' . $valueAvatar . '"';
        }
        ?> id="inputAvatar">
    </div>
    <div class="form-group">
        <label for="inputName">ATTACK POWER</label>
        <input required type="text" class="form-control" name="inputAttack" <?php
        if (isset($valueAttack)) {
            echo 'value="' . $valueAttack . '"';
        }
        ?> id="inputAttack">
    </div>
    <div class="form-group">
        <label for="inputName">LIFE LEVEL</label>
        <input required type="text" class="form-control" name="inputLife" <?php
        if (isset($valueLife)) {
            echo 'value="' . $valueLife . '"';
        }
        ?> id="inputLife">
    </div>
    <div class="form-group">
        <label for="inputName">WEAPON</label>
        <input required type="text" class="form-control" name="inputWeapon" <?php
        if (isset($valueWeapon)) {
            echo 'value="' . $valueWeapon . '"';
        }
        ?> id="inputWeapon">
    </div>
    <input type="hidden" name="type" value=<?php echo $tipoPeticion ?> >
    <input type="hidden" name="id" value=<?php 
               if (isset($id)) {
                   echo $id;
               }
    ?> >

